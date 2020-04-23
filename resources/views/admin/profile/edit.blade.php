@extends('admin.template.app')

@section('title',$admin->name . ' - Edit Profile')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile - {{$admin->name}}</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center">
                                    <img src="{{ storedImage($admin->photo) }}" alt="{{$admin->name}}" class="">
                                    <form action="{{route('admin.savePhoto',$admin->username)}}" method="post" enctype="multipart/form-data" id="photo">
                                        @csrf
                                        <input type="file" id="file" name="photo" style="display:none;">
                                        <button type="button" class="btn btn-primary mt-2 btn-sm" onclick="document.getElementById('file').click()">Change Photo Profile</button><br>
                                        @error('photo')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </form>
                                    <h5 class="mt-2"><b>{{$admin->name}}</b></h5>
                                    <p>Admin</p>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <form action="{{route('admin.saveProfile',$admin->username)}}" method="post">
                                    @csrf
                                    <div class="form-group ">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid  @enderror" value="{{old('name',$admin->name)}}">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid  @enderror" value="{{old('username',$admin->username)}}">
                                        @error('username')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid  @enderror" value="{{old('email',$admin->email)}}">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-save"></i> Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('js')
<script>
    $(document).on('change','#file',function(){
        $('#photo').submit();
    });
</script>
@endsection