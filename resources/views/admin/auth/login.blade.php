@extends('admin.auth.template')
@section('title','Login Admin')
@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
</div>
@if(Session::has('error'))
<div class="card mb-4 py-1 border-left-danger">
    <div class="card-body">
        {{session()->get('error')}}  
    </div>
</div>
@endif
<form class="user" action="{{route('admin.login')}}" method="post">
@csrf
<div class="form-group">
    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" autofocus>
    @error('email')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" >
    @error('password')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <div class="custom-control custom-checkbox small">
    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
    <label class="custom-control-label" for="remember">Remember Me</label>
    </div>
</div>
<button type="submit" class="btn btn-success btn-user btn-block">
    Login
</button>
<hr>
</form>
<div class="text-center">
<a class="small" href="{{route('admin.password.request')}}">Forgot Password?</a>
</div>
@endsection
