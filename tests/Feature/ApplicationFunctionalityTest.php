<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApplicationFunctionalityTest extends TestCase
{
    use RefreshDatabase;

    private function user(string $role, ?string $email = null): User
    {
        return User::factory()->create(['role' => $role, 'email' => $email ?? "$role@example.com"]);
    }

    private function lecturer(string $n = '1', ?User $user = null): Lecturer
    {
        return Lecturer::create([
            'user_id' => $user?->id, 'staff_id' => "LEC/$n", 'first_name' => 'Lec', 'last_name' => $n,
            'email' => "lec$n@mubs.ac.ug",
        ]);
    }

    private function course(string $code = 'ICT 1', ?Lecturer $lecturer = null, string $status = 'active'): Course
    {
        return Course::create([
            'code' => $code, 'name' => "Course $code", 'lecturer_id' => $lecturer?->id, 'status' => $status,
        ]);
    }

    private function student(string $n = '1', ?User $user = null): Student
    {
        return Student::create([
            'user_id' => $user?->id, 'registration_number' => "STU/$n", 'first_name' => 'Stu', 'last_name' => $n,
            'email' => "stu$n@mubs.ac.ug",
        ]);
    }

    private function studentPayload(array $over = []): array
    {
        return array_merge([
            'registration_number' => 'STU/9', 'first_name' => 'Ann', 'last_name' => 'Bee',
            'email' => 'ann@mubs.ac.ug', 'status' => 'active',
        ], $over);
    }

    // ---- 4a student CRUD -------------------------------------------------

    public function test_admin_can_create_update_view_and_delete_a_student(): void
    {
        $admin = $this->user('admin');

        $this->actingAs($admin)->post('/admin/students', $this->studentPayload())
            ->assertRedirect('/admin/students')->assertSessionHas('success');
        $student = Student::where('registration_number', 'STU/9')->firstOrFail();

        $this->actingAs($admin)->get("/admin/students/{$student->id}")->assertOk()->assertSee('Ann Bee');
        $this->actingAs($admin)->get('/admin/students')->assertOk()->assertSee('STU/9');

        $this->actingAs($admin)->put("/admin/students/{$student->id}", $this->studentPayload(['first_name' => 'Anna']))
            ->assertRedirect('/admin/students');
        $this->assertSame('Anna', $student->fresh()->first_name);

        $this->actingAs($admin)->delete("/admin/students/{$student->id}")->assertSessionHas('success');
        $this->assertModelMissing($student);
    }

    public function test_student_form_is_validated(): void
    {
        $admin = $this->user('admin');
        $this->student('9');

        $this->actingAs($admin)->post('/admin/students', ['first_name' => ''])
            ->assertSessionHasErrors(['registration_number', 'first_name', 'last_name', 'email']);

        $this->actingAs($admin)->post('/admin/students', $this->studentPayload(['email' => 'stu9@mubs.ac.ug']))
            ->assertSessionHasErrors('email');
    }

    public function test_student_with_registrations_cannot_be_deleted(): void
    {
        $admin = $this->user('admin');
        $student = $this->student();
        Registration::create(['student_id' => $student->id, 'course_id' => $this->course()->id]);

        $this->actingAs($admin)->delete("/admin/students/{$student->id}")->assertSessionHas('error');
        $this->assertModelExists($student);
    }

    // ---- 4b course CRUD --------------------------------------------------

    public function test_admin_can_create_update_view_and_delete_a_course(): void
    {
        $admin = $this->user('admin');
        $lecturer = $this->lecturer();
        $payload = ['code' => 'ICT 9', 'name' => 'Networks', 'credit_hours' => 3, 'lecturer_id' => $lecturer->id];

        $this->actingAs($admin)->post('/admin/courses', $payload)->assertSessionHas('success');
        $course = Course::where('code', 'ICT 9')->firstOrFail();

        $this->actingAs($admin)->get("/admin/courses/{$course->id}")->assertOk()->assertSee('Networks');
        $this->actingAs($admin)->put("/admin/courses/{$course->id}", [...$payload, 'name' => 'Networks II'])
            ->assertSessionHas('success');
        $this->assertSame('Networks II', $course->fresh()->name);

        $this->actingAs($admin)->delete("/admin/courses/{$course->id}")->assertSessionHas('success');
        $this->assertModelMissing($course);
    }

    public function test_course_validation_and_delete_guard(): void
    {
        $admin = $this->user('admin');
        $course = $this->course('ICT 1');

        $this->actingAs($admin)->post('/admin/courses', ['code' => 'ICT 1', 'name' => ''])
            ->assertSessionHasErrors(['code', 'name']);

        Registration::create(['student_id' => $this->student()->id, 'course_id' => $course->id]);
        $this->actingAs($admin)->delete("/admin/courses/{$course->id}")->assertSessionHas('error');
        $this->assertModelExists($course);
    }

    // ---- 4c registration + duplicates -----------------------------------

    public function test_admin_registration_blocks_duplicates_and_inactive_courses(): void
    {
        $admin = $this->user('admin');
        $student = $this->student();
        $course = $this->course();
        $closed = $this->course('ICT 2', null, 'inactive');

        $this->actingAs($admin)->post('/admin/registrations', ['student_id' => $student->id, 'course_id' => $course->id])
            ->assertRedirect('/admin/registrations')->assertSessionHas('success');
        $this->assertSame(1, Registration::count());

        $this->actingAs($admin)->post('/admin/registrations', ['student_id' => $student->id, 'course_id' => $course->id])
            ->assertSessionHasErrors(['course_id' => 'This student is already registered for the selected course.']);
        $this->assertSame(1, Registration::count());

        $this->actingAs($admin)->post('/admin/registrations', ['student_id' => $student->id, 'course_id' => $closed->id])
            ->assertSessionHasErrors('course_id');

        $this->actingAs($admin)->post('/admin/registrations', [])
            ->assertSessionHasErrors(['student_id', 'course_id']);
    }

    public function test_database_itself_rejects_duplicate_registrations(): void
    {
        $student = $this->student();
        $course = $this->course();
        Registration::create(['student_id' => $student->id, 'course_id' => $course->id]);

        $this->expectException(\Illuminate\Database\UniqueConstraintViolationException::class);
        Registration::create(['student_id' => $student->id, 'course_id' => $course->id]);
    }

    public function test_admin_can_approve_and_reject(): void
    {
        $admin = $this->user('admin');
        $reg = Registration::create(['student_id' => $this->student()->id, 'course_id' => $this->course()->id]);

        $this->actingAs($admin)->post("/admin/registrations/{$reg->id}/approve")->assertSessionHas('success');
        $this->assertSame('approved', $reg->fresh()->status);
        $this->actingAs($admin)->post("/admin/registrations/{$reg->id}/reject")->assertSessionHas('success');
        $this->assertSame('rejected', $reg->fresh()->status);
    }

    public function test_student_can_register_once_and_sees_it_listed(): void
    {
        $user = $this->user('student');
        $student = $this->student('1', $user);
        $course = $this->course();

        $this->actingAs($user)->get('/student/courses')->assertOk()->assertSee('Course ICT 1')->assertSee('Register');

        $this->actingAs($user)->post('/student/registrations', ['course_id' => $course->id])
            ->assertRedirect('/student/registrations')->assertSessionHas('success');
        $this->assertSame('pending', $student->registrations()->first()->status);

        $this->actingAs($user)->post('/student/registrations', ['course_id' => $course->id])
            ->assertSessionHasErrors(['course_id' => 'You are already registered for this course.']);
        $this->assertSame(1, Registration::count());

        $this->actingAs($user)->get('/student/registrations')->assertOk()->assertSee('Course ICT 1')->assertSee('Pending');
    }

    public function test_student_cannot_register_for_someone_else_or_a_closed_course(): void
    {
        $user = $this->user('student');
        $me = $this->student('1', $user);
        $other = $this->student('2');
        $closed = $this->course('ICT 2', null, 'inactive');
        $open = $this->course('ICT 3');

        // student_id in the form is ignored: the registration is always for the logged-in student
        $this->actingAs($user)->post('/student/registrations', ['course_id' => $open->id, 'student_id' => $other->id]);
        $this->assertSame(1, $me->registrations()->count());
        $this->assertSame(0, $other->registrations()->count());

        $this->actingAs($user)->post('/student/registrations', ['course_id' => $closed->id])
            ->assertSessionHasErrors('course_id');
    }

    // ---- 4d role based display / access ---------------------------------

    public function test_student_sees_only_their_own_registrations_and_can_only_cancel_own_pending(): void
    {
        $user = $this->user('student');
        $me = $this->student('1', $user);
        $other = $this->student('2');
        $mine = Registration::create(['student_id' => $me->id, 'course_id' => $this->course('ICT 1')->id]);
        $theirs = Registration::create(['student_id' => $other->id, 'course_id' => $this->course('ECO 9')->id]);

        $this->actingAs($user)->get('/student/registrations')->assertOk()
            ->assertSee('ICT 1')->assertDontSee('ECO 9');

        $this->actingAs($user)->delete("/student/registrations/{$theirs->id}")->assertForbidden();
        $this->assertModelExists($theirs);

        $mine->update(['status' => 'approved']);
        $this->actingAs($user)->delete("/student/registrations/{$mine->id}")->assertSessionHas('error');
        $this->assertModelExists($mine);

        $mine->update(['status' => 'pending']);
        $this->actingAs($user)->delete("/student/registrations/{$mine->id}")->assertSessionHas('success');
        $this->assertModelMissing($mine);
    }

    public function test_lecturer_sees_only_assigned_courses_and_their_students(): void
    {
        $user = $this->user('lecturer');
        $lecturer = $this->lecturer('1', $user);
        $mine = $this->course('ICT 1', $lecturer);
        $notMine = $this->course('ECO 9', $this->lecturer('2'));
        Registration::create(['student_id' => $this->student('1')->id, 'course_id' => $mine->id]);
        Registration::create(['student_id' => $this->student('2')->id, 'course_id' => $notMine->id]);

        $this->actingAs($user)->get('/lecturer/courses')->assertOk()->assertSee('ICT 1')->assertDontSee('ECO 9');
        $this->actingAs($user)->get("/lecturer/courses/{$mine->id}")->assertOk()
            ->assertSee('STU/1')->assertDontSee('STU/2');
        $this->actingAs($user)->get("/lecturer/courses/{$notMine->id}")->assertForbidden();
    }

    public function test_roles_cannot_open_other_roles_pages(): void
    {
        $student = $this->user('student');
        $lecturer = $this->user('lecturer');
        $reg = Registration::create(['student_id' => $this->student()->id, 'course_id' => $this->course()->id]);

        $this->actingAs($student)->get('/admin/students')->assertForbidden();
        $this->actingAs($student)->get('/lecturer/courses')->assertForbidden();
        $this->actingAs($student)->delete("/admin/registrations/{$reg->id}")->assertForbidden();
        $this->assertModelExists($reg);
        $this->actingAs($lecturer)->get('/student/courses')->assertForbidden();
        $this->actingAs($lecturer)->post('/student/registrations', ['course_id' => 1])->assertForbidden();
        $this->actingAs($this->user('admin'))->get('/student/courses')->assertForbidden();
    }

    public function test_guests_are_sent_to_login(): void
    {
        $this->get('/student/courses')->assertRedirect('/login');
        $this->get('/lecturer/courses')->assertRedirect('/login');
        $this->get('/admin/registrations')->assertRedirect('/login');
    }

    public function test_account_without_a_profile_gets_a_clear_403_and_email_match_links_profile(): void
    {
        $orphan = $this->user('student', 'nobody@mubs.ac.ug');
        $this->actingAs($orphan)->get('/student/courses')->assertForbidden();

        $linked = $this->user('student', 'stu1@mubs.ac.ug');
        $student = $this->student('1');               // created by admin first, no user yet
        $this->actingAs($linked)->get('/student/courses')->assertOk();
        $this->assertSame($linked->id, $student->fresh()->user_id);
    }

    public function test_navigation_only_shows_links_for_the_role(): void
    {
        $studentUser = $this->user('student');
        $this->student('1', $studentUser);

        $this->actingAs($studentUser)->get('/student/courses')
            ->assertSee('My registrations')->assertDontSee('Lecturers')->assertDontSee('>Students<', false);

        $this->actingAs($this->user('admin'))->get('/admin/students')
            ->assertSee('Lecturers')->assertDontSee('My registrations');
    }
}
