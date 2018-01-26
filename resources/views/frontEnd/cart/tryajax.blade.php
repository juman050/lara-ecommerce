@extends('frontEnd.master')
@section('title')
View Cart
@endsection
@section('mainContent')
<script>
$(document).ready(function(){
    (function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id');
                var proId = $('#proId').val();
                $.ajax({
                  type: "get",
                  url: '{{ url("/update-cart") }}' + '/' + id,
                  data: {
                    'qty': this.value,
                    'proId':proId,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/show-cart') }}';
                  }
                });
            });
        })
});
</script>
<section id="cartpage">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="panel panel-default">
<div id="updateDiv">
@if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
          @if(session('error_message'))
        <div class="alert alert-danger">
            {{session('error_message')}}
        </div>
        @endif
        
    <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Sr no.</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                    <th>Action</th>
                    </tr>
                </thead>
            <tbody>
        <?php
        $cartProduct = Cart::content();
        $result = count($cartProduct);
          if($result>0){
          $total = 0 ;
          //$count = 1; 
          ?>
        @foreach($cartProduct as $carts)
            <tr>
                <td>{{ $carts->id }}</td>
                <td>{{ $carts->name }}</td>
                <td>
                <img src="{{ ($carts->options->image) }}" width="40px" height="40px">
                <p class="text-success">only {{ $carts->options->stockIn }} left</p>
                </td>
                <td>TK {{ $carts->price }}</td>
                <td>
                <form class="form-inline" action="{{ URL::to('/update-cart') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" id="proId" name="productId" class="form-control qty" value="{{ $carts->id }}">
                        <input type="hidden" id="rowId" name="rowid" class="form-control" value="{{ $carts->rowId }}">
                        <select class="quantity" data-id="{{ $carts->rowId }}">
                                <option {{ $carts->qty == 1 ? 'selected' : '' }}>1</option>
                                <option {{ $carts->qty == 2 ? 'selected' : '' }}>2</option>
                                <option {{ $carts->qty == 3 ? 'selected' : '' }}>3</option>
                                <option {{ $carts->qty == 4 ? 'selected' : '' }}>4</option>
                                <option {{ $carts->qty == 5 ? 'selected' : '' }}>5</option>
                            </select>
                    </div>
                       
                    </form>
                </td>
                <td>
                    TK {{ $carts->subtotal()}}
                    <?php $itemTotal = $carts->qty*$carts->price ?>
                </td>

                <td>
                <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('/delete-cart/'.$carts->rowId) }}">
                <button class="btn btn-danger">
                <span class="fa fa-trash" aria-hidden="true"></span>
                </button>
                </a>
                </td>
            </tr>
            
            
           <?php 
                $total = $total + $itemTotal;
               // $count++; 
           ?>
         @endforeach


            </tbody>

            </table>
        
    </div>

<aside class="pull-right">

            <p>
                <td><strong>Total:</strong></td>
                <td class="text-primary pull-right">TK <?php echo $total; ?></td>
            </p>
            <p>
                <td><strong>Vat:</strong></td>
                <td class="text-danger pull-right">12%</td>
            </p>
            <p >
                <td><strong>Grand Total:</strong>  </td>
                <td class="text-success pull-right">
                       Tk. <?php echo $grandTotal = $total + $total*.12;                  
                        Session::put('orderTotal',$grandTotal);  ?> 
                </td>
            </p>
            <p  class="pull-right">

                         <a href="{{url('/')}}" class="btn btn-success">
                            Continue Shopping
                        </a>
      
                    <?php
                    $count =Cart::count(); 
                    if($count>0){
                        $customerId = Session::get('customerId');
                        $shippingId = Session::get('shippingId');
                        if ($customerId != null && $shippingId != null) {
                    ?>
                        <a href="{{url('/checkout-payment')}}">
                         <button class="btn btn-success lal">Payment</button>
                        </a>
                     <?php } else if ($customerId != null) { ?>
                    <a href="{{ url('/shipping-info') }}"><button class="btn btn-success lal">Shipping</button></a>                
                <?php } else { ?>
                    <a href="{{url('/checkout')}}" class="btn btn-success lal">
                        Checkout
                        </a>
                <?php }
                    }?>
             </p>
        </aside>

<?php } else{
     echo '<div class="alert alert-danger">Empty Cart</div>';
} ?>
</div>
</div>
</div>
</div>
</section>
@endsection