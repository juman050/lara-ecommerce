@extends('frontEnd.master')

@section('title')
payment
@endsection

@section('mainContent')
<section id="featuredProduct">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{ $customerById->lastName }}</b>. You have to give us product shipping information to complete your valuable order. If your product billing information & shipping information are same then just press on save shipping info button</div>
        </div>
    </div>
</div>
      <div class="container">
        <div class="row">
        <div class="col-md-7">
<div class="well box box-primary">
                
                
                <h3>Order Review</h3>
                <hr>
                <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                    </tr>
                </thead>
            <tbody>
        <?php $cartProducts = Cart::content(); ?>
        @foreach($cartProducts as $cartProduct)
            <tr>
                <td>{{ $cartProduct->name }}</td>
                <td>
                <img src="{{ ($cartProduct->options->image) }}" width="40px" height="40px">
                </td>
                <td>
                {{ $cartProduct->qty }}
                </td>
                <td>TK {{ $cartProduct->price }}</td>


                <td>

                    <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('/delete-cart/'.$cartProduct->rowId) }}">
            <button class="btn btn-danger">
            <span class="fa fa-trash" aria-hidden="true"></span>
            </button>
            </a>
                </td>

            </tr>
         @endforeach


            </tbody>

            </table>
            

    </div>  
            </div>


    </div>
    <div class="col-md-5">
        <h3>Payment Method</h3>
                <hr>
                {!! Form::open(['url'=>'/checkout/save-order', 'method'=>'POST']) !!}
                  {{csrf_field()}}
                  <span class="text-danger">{{ $errors->has('paymentType') ? $errors->first('paymentType') : '' }}</span>
                <div class="form-group">
                    <div class="">
                        <label><input type="radio" name="paymentType" value="cashOnDelivery"> Cash On Delivery</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label><input type="radio" name="paymentType" value="bkash"> Bkash</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="">
                        <label><input type="radio" name="paymentType" value="paypal"> Paypal</label>
                    </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Continue</button>
                </div>
                {!! Form::close() !!}
     </div>

    </div>
    </div>

</section>
 <hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
         
            
        </div>
    </div>
    </div>
    <script type="text/javascript">
    document.forms['shippingInfo'].elements['districtName'].value='<?php echo $customerById->districtName;?>'
</script>
    @endsection