<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isLecturer(): bool
    {
        return $this->role === 'lecturer';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function lecturer(): HasOne
    {
        return $this->hasOne(Lecturer::class);
    }

    /**
     * The student record belonging to this login. If the admin created the
     * student record first, it is linked automatically by matching e-mail.
     */
    public function studentProfile(): ?Student
    {
        $student = $this->student;

        if (! $student) {
            $student = Student::whereNull('user_id')->where('email', $this->email)->first();
            $student?->update(['user_id' => $this->id]);
        }

        return $student;
    }

    /** The lecturer record belonging to this login (same auto-link as above). */
    public function lecturerProfile(): ?Lecturer
    {
        $lecturer = $this->lecturer;

        if (! $lecturer) {
            $lecturer = Lecturer::whereNull('user_id')->where('email', $this->email)->first();
            $lecturer?->update(['user_id' => $this->id]);
        }

        return $lecturer;
    }
}
