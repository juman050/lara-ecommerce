@extends('admin.dashboard.master')
@section('content')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Product</h3>
              <hr>
              @if(Session::has('msg')) <div class ='alert alert-success'> {{Session::get('msg')}} </div> @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th width="20%">Product Image</th>
                  <th width="15%">Product Name</th>
                  <th width="20%">Product Description</th>
                  <th width="15%">Publication Status</th>
                  <th width="15%">Date</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($products as $product)
                    <tr>
                        <td><img width="100px" height="70px" src="{{asset($product->productImage)}}"></td>
                     <td>
                         {{$product->productName}}
                     <p><span class="label label-{{ $product->isFeatured == 1 ? 'warning' : '' }}">
                             {{ $product->isFeatured == 1 ? 'Featured' : '' }}
                         </span>
                     </p>
                     </td>
                     <td>{!! $product->productShortDescription !!}</td>
                      <td><span class="label label-{{ $product->publicationStatus == 1 ? 'success' : 'warning' }}">{{ $product->publicationStatus == 1 ? 'Published' : 'Unpublished' }}</span></td>
                      <td>{{ date('F j, Y, g:i a',strtotime($product->created_at)) }}</td>
                      
                      <td class="">
                        <div class="btn-group-horizontal">
                                <?php if($product->publicationStatus == 1){?>
                            <a href="{{ url('/unpublished-product/'.$product->id) }}" class="btn btn-info" title="Unpublish"><i class="fa fa-thumbs-o-down fa-align-left"></i></a>
                               <?php }else{?>
                                <a href="{{ url('/published-product/'.$product->id) }}" class="btn btn-success" title="Publish"> <i class="fa fa-thumbs-o-up fa-align-left"></i></a>
                              <?php } ?>
                      <a href="{{ url('/product/edit/'.$product->id) }}" class="btn btn-primary"><i class="fa fa-edit fa-align-center"></i></a>
                      <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$product->id}}"><i class="fa fa-trash fa-align-right"></i></a>
                    </div>
                      </td>
                    </tr>
                      <!-- Modal -->
  <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Product</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure want ti delete this?</p>
        </div>
        <div class="modal-footer">
          <a href="{{ url('/product/delete/'.$product->id) }}" class="btn-sm btn-danger">Delete</a>
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