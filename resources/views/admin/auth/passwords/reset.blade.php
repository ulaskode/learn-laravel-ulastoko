@extends('admin.auth.template')
@section('title','Reset Password Admin')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
</div>

<form action="{{ route('admin.password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email ...">

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter New Password ...">

        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
    </div>

    <button type="submit" class="btn btn-success btn-block">Reset Password</button>
</form>
@endsection
