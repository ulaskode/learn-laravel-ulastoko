@extends('admin.auth.template')
@section('title','Reset Password Admin')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email ....">
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block btn-user">Send Password Reset Link</button>
        </form>
    </div>
</div>
@endsection
