@extends('layouts.app')

@section('title', 'Users & Roles')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Users & Roles</h1>
    <p class="text-slate-500 text-sm">All system users and their roles.</p>
</div>

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-slate-50 text-slate-600">
            <tr>
                <th class="px-4 py-3 text-left font-medium">Name</th>
                <th class="px-4 py-3 text-left font-medium">Email</th>
                <th class="px-4 py-3 text-left font-medium">Role</th>
                <th class="px-4 py-3 text-left font-medium">Joined</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($users as $user)
                <tr class="hover:bg-slate-50">
                    <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">
                    @php($roleName = $user->getRoleNames()->first() ?? 'none')
                    <span class="text-xs px-2 py-1 rounded-full
                        {{ $roleName === 'admin' ? 'bg-blue-50 text-blue-700' : ($roleName === 'lecturer' ? 'bg-amber-50 text-amber-700' : 'bg-emerald-50 text-emerald-700') }}">
                        {{ ucfirst($roleName) }}
                    </span>
                    </td>
                    <td class="px-4 py-3 text-slate-500">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-8 text-center text-slate-500">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links() }}
</div>
@endsection
