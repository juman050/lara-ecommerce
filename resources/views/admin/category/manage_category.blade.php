@extends('admin.dashboard.master')
@section('content')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Categories</h3>   <hr/>
              <br>
              @if(Session::has('msg')) <div class ='alert alert-success'> {{Session::get('msg')}} </div> @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th width="15%">Category Name</th>
                  <th width="30%">Category Description</th>
                  <th width="15%">Publication Status</th>
                  <th width="20%">Date</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($categories as $category)
                    <tr>
                     <td>{{$category->categoryName}}</td>
                     <td>{!! $category->categoryDescription !!}</td>
                      <td><span class="label label-{{ $category->publicationStatus == 1 ? 'success' : 'warning' }}">{{ $category->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</span></td>
                      <td>{{ date('F j, Y, g:i a',strtotime($category->created_at)) }}</td>
                      <td class="">
                        <div class="btn-group-horizontal">
                                <?php if($category->publicationStatus == 1){?>
                            <a href="{{ url('/unpublished-category/'.$category->id) }}" class="btn btn-info" title="Unpublish"><i class="fa fa-thumbs-o-down fa-align-left"></i></a>
                               <?php }else{?>
                                <a href="{{ url('/published-category/'.$category->id) }}" class="btn btn-success" title="Publish"> <i class="fa fa-thumbs-o-up fa-align-left"></i></a>
                              <?php } ?>
                      <a href="{{ url('/edit-category/'.$category->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-align-center"></i></a>
                      <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$category->id}}"><i class="fa fa-trash fa-align-right"></i></a>
                    </div>
                      </td>
                    </tr>

  <!-- Modal -->
  <div class="modal fade" id="myModal{{$category->id}}" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Category</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want ti delete this?</p>
        </div>
        <div class="modal-footer">
          <a href="{{ url('/delete-category/'.$category->id) }}" class="btn-sm btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>
                   @endforeach
          
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  @endsection