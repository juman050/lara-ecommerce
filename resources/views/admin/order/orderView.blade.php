@extends('admin.dashboard.master')
@section('content')
<!-- Main content -->
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">View Invoice</h3>   
        </div>
          <div class="box-body ">
              <div class="col-md-12">
    <div class="col-xs-12">
        
            <div class="invoice-title">
                
                <h4>
                   
                    
                </h4>  
                <h3 class="pull-right">Order # {{$orderInfoById->id}}</h3>
            </div>
            <hr>
            <div class="row">
                    <div class="col-xs-6">
                            <address>
                            <strong>Billed To:</strong><br>
                                    {{$orderInfoById->firstName}}<br>
                                    {{$orderInfoById->phoneNumber}}<br>
                                    {{$orderInfoById->districtName}}<br>
                                    {{$orderInfoById->address}}
                            </address>
                    </div>
                    <div class="col-xs-6 text-right">
                            <address>
                            <strong>Shipped To:</strong><br>
                                    {{ $shippingInfoById->fullName }}<br>
                                    phone: {{ $shippingInfoById->phoneNumber }}<br>
                                    {{ $shippingInfoById->districtName }}<br>
                                    {{ $shippingInfoById->address }}
                            </address>
                    </div>
            </div>
            <div class="row">
                    <div class="col-xs-6">
                            <address>
                                    <strong>Payment Method:</strong><br>
                                    {{$orderInfoById->paymentType}}<br>
                            </address>
                    </div>
                    <div class="col-xs-6 text-right">
                            <address>
                                    <strong>Order Date:</strong><br>
                                    {{ date('F j, Y, g:i a',strtotime($orderInfoById->created_at)) }}
                                    <br><br>
                            </address>
                    </div>
            </div>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-12">
            <div class="panel panel-default">
                    <div class="panel-heading">
                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                            <div class="table-responsive">
                                    <table class="table table-condensed">
                                            <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @foreach($orderDetails as $orderDetail)
                                <tr>
                                <td>{{ $orderDetail->productName }}</td>
                                <td class="text-center">{{ $orderDetail->productPrice }}</td>
                                <td class="text-center">{{ $orderDetail->productQuantity }}</td>

                                </tr>
                            @endforeach
                                <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Total</strong></td>
                                <td class="thick-line text-center">{{ $orderInfoById->orderTotal }}(including vat)</td>
                                </tr>

                        </tbody>
                </table>
                            </div>
                    </div>
            </div>
    </div>
</div>
          </div>
           <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endsection