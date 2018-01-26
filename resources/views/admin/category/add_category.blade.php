@extends('admin.dashboard.master')
@section('content')
<div class="row">
<div class="col-md-7">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Category</h3>
         <hr/>
      @if(session('message')) <div class ='alert alert-success'> {{session('message')}}</div>  @endif
      
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::open(['url' => '/save-category','role'=>'form','method' => 'POST']) !!}

      <div class="box-body">
        <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Category Name</label>
          <input type="text" name="categoryName" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
          <span class="text-danger">{{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Category Description</label>
          <textarea id="editor1" name="categoryDescription" class="textarea" placeholder="Place some text here"
                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">             
          </textarea>
          <span class="text-danger">{{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Publication Status</label>
          <select name="publicationStatus" id="DropDownTimezone" class="form-control">
              <option>Select Publication Status</option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option> 
          </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Save Category</button>

      </div>
      <!-- /.box-body -->


   {!! Form::close() !!}
  </div>
  <!-- /.box -->

</div>
</div>

@endsection
