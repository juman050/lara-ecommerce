@extends('admin.dashboard.master')
@section('content')
<div class="row">
 <div class="col-md-7">
    <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Profile</h3>   <hr/>
     @if(Session::has('message'))  <div class ='alert alert-success'> {{Session::get('message')}}</div>  @endif
      
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::open(['url' => '/modify-profile','role'=>'form','method' => 'POST']) !!}

      <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Name</label>
          <input type="text" name="admin_name" class="form-control" id="exampleInputEmail1" value="{{$adminInfo->admin_name}}">
          <span class="text-danger">{{ $errors->has('admin_name') ? $errors->first('admin_name') : '' }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Email</label>
          <input type="text" name="admin_email" class="form-control" id="exampleInputEmail1" value="{{$adminInfo->admin_email}}">
          <span class="text-danger">{{ $errors->has('admin_email') ? $errors->first('admin_email') : '' }}</span>
        </div>
           <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Password</label>
            <input type="text" name="admin_password" class="form-control" id="exampleInputEmail1" value="" placeholder="Change Password">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update Profile</button>

      </div>
      <!-- /.box-body -->


   {!! Form::close() !!}
  </div>
  </div>
 </div>
@endsection