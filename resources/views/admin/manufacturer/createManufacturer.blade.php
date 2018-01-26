@extends('admin.dashboard.master')
@section('content')
<div class="row">
<div class="col-md-7">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Manufacturer</h3>
      <hr/>

      @if(Session::has('message')) <div class ='alert alert-success'> {{Session::get('message')}}</div>  @endif
      
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::open(['url' => '/save-manufacturer','role'=>'form','method' => 'POST','enctype' =>'multipart/form-data']) !!}

      <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Manufacturer Name</label>
          <input type="text" name="manufacturerName" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
          <span class="text-danger">{{ $errors->has('manufacturerName') ? $errors->first('manufacturerName') : '' }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Manufacturer Description</label>
          <textarea id="editor1" name="manufacturerDescription" class="textarea" placeholder="Place some text here"
                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">             
          </textarea>
          <span class="text-danger">{{ $errors->has('manufacturerDescription') ? $errors->first('manufacturerDescription') : '' }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Manufacturer Image</label>
            <input type="file" id="exampleInputFile" name="manufacturerImage">
            <p class="help-block">Image size should be less than 2MB.</p>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Publication Status</label>
          <select name="publicationStatus" id="DropDownTimezone" class="form-control">
              <option>Select Publication Status</option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option> 
          </select>
          <span class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : '' }}</span>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save Manufacturer</button>

      </div>
      <!-- /.box-body -->


   {!! Form::close() !!}
  </div>
  <!-- /.box -->

</div>
</div>

@endsection
