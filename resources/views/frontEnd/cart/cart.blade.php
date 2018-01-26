@extends('frontEnd.master')
@section('title')
View Cart
@endsection
@section('mainContent')

<section id="cartpage">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="panel panel-default">
<div class="panel-body">
<h4 class="pro_title">Your Cart</h4>
<hr/>
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
            <table class="table">
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
                <form class="form-inline" action="" method="get">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" id="proId{{ $carts->rowId }}" value="{{ $carts->id }}">
                        <input type="hidden" id="rowId" name="rowid" class="form-control" value="{{ $carts->rowId }}">
                        <select class="quantity form-control" data-id="{{ $carts->rowId }}">
                             <?php
                                $max = $carts->options->stockIn;
                                for($s = 1;$s<=$max;$s++){
                              ?>
                                <option {{ $carts->qty == $s ? 'selected' : '' }}>{{$s}}</option>
                                
                             <?php    } ?>
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
                    <?php
$customerId = Session::get('customerId');
         if($customerId != NULL){
             ?><form class="formTo" action="{{ url('/switchToWishlist/'.$carts->rowId) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="productId" value="{{ $carts->id }}">
                    <input type="hidden" name="rowId" value="{{ $carts->rowId }}">
                    <input type="hidden" name="cmrId" value="{{ $customerId }}">
                        <button class="btn btn-info" type="submit"> To Wishlist </button>
               
                    </form><?php } ?>
                </td>
            </tr>
            
            
           <?php 
                $total = $total + $itemTotal;
           ?>
         @endforeach
      


            </tbody>

            </table>
        
    </div>

        <aside class="pull-right" style="padding-right: 40px;">

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
                        <a href="{{url('/clear-cart')}}" class="btn btn-danger">
                            Clear Cart
                        </a>
                         <a href="{{url('/')}}" class="btn btn-info">
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
                         <button class="btn btn-success">Payment</button>
                        </a>
                     <?php } else if ($customerId != null) { ?>
                    <a href="{{ url('/shipping-info') }}"><button class="btn btn-success">Shipping</button></a>                
                <?php } else { ?>
                    <a href="{{url('/checkout')}}" class="btn btn-success">
                        Checkout
                        </a>
                <?php }
                    }?>
             </p>
        </aside>

<?php } else{
     echo '';
} ?>
</div>
</div>

</div>
</div>
</div>
</section>
<script type="text/javascript">
    (function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             $('.quantity').on('change', function() {
                var id = $(this).attr('data-id');
                var proid = $("#proId"+id).val();
                $.ajax({
                  type: "get",
                  url: '{{ url("/update-cart") }}' + '/' + id,
                  data: {
                    'qty': this.value,
                    'proid':proid,
                  },
                  success: function(data) {
                    window.location.href = '{{ url('/show-cart') }}';
                  }
                });
            });
   })();
</script>
@endsection