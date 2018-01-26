@extends('admin.dashboard.master')
@section('content')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Manufacturer</h3>
             <hr/>

      @if(Session::has('msg')) <div class ='alert alert-success'> {{Session::get('msg')}}</div>  @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th width="20%">Manufacturer Image</th>
                  <th width="15%">Manufacturer Name</th>
                  <th width="20%">Manufacturer Description</th>
                  <th width="15%">Publication Status</th>
                  <th width="15%">Date</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td><img width="100px" height="70px" src="{{asset($manufacturer->manufacturerImage)}}"></td>
                     <td>{{$manufacturer->manufacturerName}}</td>
                     <td>{!! $manufacturer->manufacturerDescription !!}</td>
                      <td><span class="label label-{{ $manufacturer->publicationStatus == 1 ? 'success' : 'warning' }}">{{ $manufacturer->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</span></td>
                      <td>{{$manufacturer->created_at }}</td>
                      <td class="">
                        <div class="btn-group-horizontal">
                                <?php if($manufacturer->publicationStatus == 1){?>
                            <a href="{{ url('/unpublished-manufacturer/'.$manufacturer->id) }}" class="btn btn-info" title="Unpublish"><i class="fa fa-thumbs-o-down fa-align-left"></i></a>
                               <?php }else{?>
                                <a href="{{ url('/published-manufacturer/'.$manufacturer->id) }}" class="btn btn-success" title="Publish"> <i class="fa fa-thumbs-o-up fa-align-left"></i></a>
                              <?php } ?>
                      <a href="{{ url('/edit-manufacturer/'.$manufacturer->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-align-center"></i></a>
                      <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$manufacturer->id}}"><i class="fa fa-trash fa-align-right"></i></a>
                    </div>
                      </td>
                    </tr>
                      <!-- Modal -->
  <div class="modal fade" id="myModal{{$manufacturer->id}}" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Manufacturer</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want ti delete this?</p>
        </div>
        <div class="modal-footer">
          <a href="{{ url('/delete-manufacturer/'.$manufacturer->id) }}" class="btn-sm btn-danger">Delete</a>
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