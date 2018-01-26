@extends('admin.dashboard.master')
@section('content')
<div class="row">
<div class="col-md-7">
  <!-- general form elements -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Product</h3>
      <hr/>

      @if(Session::has('message')) <div class =' alert alert-success'> {{Session::get('message')}}</div>  @endif
      
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    {!! Form::open(['url' => '/product/update','name'=>'updateProduct','method' => 'POST','enctype' =>'multipart/form-data']) !!}

      <div class="box-body">
        <div class="form-group">
            <input type="hidden" name="Id" value="{{ $productById->id }}">
            <label for="exampleInputEmail1" class="control-label">Product Name</label>
          <input type="text" name="productName" class="form-control" id="exampleInputEmail1" value="{{ $productById->productName }}">
          <span class="text-danger">{{ $errors->has('productName') ? $errors->first('productName') : '' }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Category Name</label>
          <select name="categoryId" id="DropDownTimezone" class="form-control">
              <option>Select Category Name</option>
              @foreach($categories as $all_category)
              <option value="{{$all_category->id}}">{{$all_category->categoryName}}</option>
              @endforeach
          </select>
          <span class="text-danger">{{ $errors->has('categoryId') ? $errors->first('categoryId') : '' }}</span>
        </div>
             <div class="form-group">
          <label for="exampleInputFile">Manufacturer Name</label>
          <select name="manufacturerId" id="DropDownTimezone" class="form-control">
              <option>Select Manufacturer Name</option>
              @foreach($manufacturers as $all_manufacturer)
              <option value="{{$all_manufacturer->id}}">{{$all_manufacturer->manufacturerName}}</option>
              @endforeach
          </select>
          <span class="text-danger">{{ $errors->has('manufacturerId') ? $errors->first('manufacturerId') : '' }}</span>
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Product Price</label>
          <input type="text" name="productPrice" class="form-control" id="exampleInputEmail1" value="{{ $productById->productPrice }}">
          <span class="text-danger">{{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}</span>
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="control-label">Product Quantity</label>
          <input type="number" name="productQuantity" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Qty" value="{{ $productById->productQuantity }}">
          <span class="text-danger">{{ $errors->has('productQuantity') ? $errors->first('productQuantity') : '' }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Product Short Description</label>
          <textarea id="editor1" name="productShortDescription" class="textarea" placeholder="Place some text here"
                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">             
              {{ $productById->productShortDescription }}
          </textarea>
          <span class="text-danger">{{ $errors->has('productShortDescription') ? $errors->first('productShortDescription') : '' }}</span>
        </div>
          <div class="form-group">
          <label for="exampleInputPassword1">Product Long Description</label>
          <textarea id="editor2" name="productLongDescription" class="textarea" placeholder="Place some text here"
                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">             
              {{ $productById->productLongDescription }}
          </textarea>
          <span class="text-danger">{{ $errors->has('productLongDescription') ? $errors->first('productLongDescription') : '' }}</span>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Product Image</label>
            <input type="file" id="exampleInputFile" name="productImage">
            <span class="text-danger">{{ $errors->has('productImage') ? $errors->first('productImage') : '' }}</span>
            <img width="70px" height="50px" src="{{asset($productById->productImage)}}">
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
          <div class="form-group">
          <label for="exampleInputFile">Is featured</label>
          <select name="isFeatured" id="DropDownTimezone" class="form-control">
              <option value="0">Not Featured</option>
              <option value="1">Featured</option> 
          </select>
          <span class="text-danger">{{ $errors->has('publicationStatus') ? $errors->first('publicationStatus') : '' }}</span>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update Product</button>

      </div>
      <!-- /.box-body -->


   {!! Form::close() !!}
  </div>
  <!-- /.box -->

</div>
</div>
<script type="text/javascript">
    document.forms['updateProduct'].elements['isFeatured'].value='<?php echo $productById->isFeatured;?>'
    document.forms['updateProduct'].elements['publicationStatus'].value='<?php echo $productById->publicationStatus;?>'
    document.forms['updateProduct'].elements['manufacturerId'].value='<?php echo $productById->manufacturerId;?>'
    document.forms['updateProduct'].elements['categoryId'].value='<?php echo $productById->categoryId;?>'
</script>
@endsection
