@extends('admin.template.app')

@section('title', $admin->name . ' - Change Password')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Change Password - {{$admin->name}}</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /sukses atau gagal -->
@if(Session::has('success'))
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session()->get('success')}}
        </div>
    </div>
</div>
@endif
@if(Session::has('error'))
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session()->get('error')}}
        </div>
    </div>
</div>
@endif
<!-- /.sukses atau gagal -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.savePassword',$admin->username)}}" method="post">
                    @csrf 
                    <div class="form-group ">
                        <label for="current_password">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password">
                        @error('current_password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password">
                        @error('new_password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_confirm_password">Confirm Password</label>
                        <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" id="new_confirm_password">
                        @error('new_confirm_password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection