@extends('layout.footer')
@extends('layout.content')

@section('content')

<div class="container">
    <h2>Admin Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.update') }}">
        @csrf
        @method('PUT')

        <!-- Username Field -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" value="{{ old('username', $admin->username) }}" required>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Current Password Field -->
        <div class="form-group">
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" class="form-control" placeholder="Enter current password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- New Password Field -->
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Enter new password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm New Password Field -->
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

@endsection
@extends('layout.header')
