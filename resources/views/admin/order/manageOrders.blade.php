@extends('admin.dashboard.master')
@section('content')
    <!-- Main content -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Orders</h3>   <hr/>
              @if(Session::has('msg')) <div class ='alert alert-success'> {{Session::get('msg')}} </div> @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th width="20%">Customer Name</th>
                  <th width="20%">Order Total</th>
                  <th width="20%">Order Status</th>
                  <th width="20%">Order Date</th>
                  <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($orders as $order)
                    <tr>
                     <td>{{$order->firstName." ".$order->lastName }}</td>
                     <td>{{$order->orderTotal}}</td>
                      <td><span class="label label-{{ $order->orderStatus == 1 ? 'success' : 'warning' }}">{{ $order->orderStatus == 1 ? 'Order Placed' : 'Order Pending' }}</span></td>
                      <td>{{ date('F j, Y, g:i a',strtotime($order->created_at)) }}</td>
                      <td class="">
                        <div class="btn-group-horizontal">
                           <?php if($order->orderStatus == 1){?>
                            <a href="{{ url('/make-order-pending/'.$order->id) }}" class="btn btn-info" title="make-order-pending"><i class="fa fa-thumbs-o-down fa-align-left"></i></a>
                               <?php }else{?>
                                <a href="{{ url('/make-order-placed/'.$order->id) }}" class="btn btn-success" title="make-order-placed"> <i class="fa fa-thumbs-o-up fa-align-left"></i></a>
                              <?php } ?>
                          <a href="{{ url('/view-invoice/'.$order->id) }}" class="btn btn-success" title="view order"> <i class="fa fa-eye fa-align-left"></i></a>

            
                      <a href=""  title="Delete Order" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{$order->id}}"><i class="fa fa-trash fa-align-right"></i></a>
                    </div>
                      </td>
                    </tr>

  <!-- Modal -->
  <div class="modal fade" id="myModal{{$order->id}}" role="dialog">
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
          <a href="{{ url('/delete-category/'.$order->id) }}" class="btn-sm btn-danger">Delete</a>
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