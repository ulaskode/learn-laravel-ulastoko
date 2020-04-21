@extends('admin.auth.template')
@section('title','Login Admin')
@section('content')
<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{session()->get('error')}}
        </div>
        @endif
        <form class="user" action="{{route('admin.login')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" autofocus>
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" >
                @error('password')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                    Remember Me
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-user btn-block">
                Login
            </button>
        </form>

        <p class="mb-1">
            <a href="{{route('admin.password.request')}}">I forgot my password</a>
        </p>
    </div>
</div>
@endsection
