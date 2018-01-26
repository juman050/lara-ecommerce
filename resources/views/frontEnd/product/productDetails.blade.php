@extends('frontEnd.master')
@section('title')
    product details
@endsection
@section('mainContent')
<script type="text/javascript">
 $(document).ready(function(){
    $('#successMsg').hide();
    $('#success_Msg').hide();
    var itemCount = <?php echo Cart::count(); ?>;
        $('#addCartBtn').click(function(){
          itemCount++;
            var pro_id = $('#pro_id').val();
            var newqty = $('#product_qty').val();
           $.ajax({
               type: 'get',
               dataType: 'html',
               url: '<?php echo url('/add-to-cart')?>/'+pro_id,
               data: "qty=" + newqty +  "& proId=" + pro_id,
               success:function(){
                  $('#addCartBtn').hide();            
                  $('#successMsg').append('product has been added to cart');
                  $('#itemCount').html(" Cart ("+itemCount+") ");
                  $('#successMsg').fadeToggle("slow");
               }
           });
        });
        <?php
        $customerId = Session::get('customerId');
        $totalwishlistCount = DB::table('wishlists')->where('customerId',$customerId)->count();
    ?>
        var wishlistCount = <?php echo $totalwishlistCount;  ?>;
        $('#wishBtn').click(function(){
          wishlistCount ++;
            var pro_id = $('#pro_id').val();
           
           $.ajax({
               type: 'get',
               url: '<?php echo url('/add-to-wishlist')?>/'+pro_id,
               success:function(){
                  $('#wishBtn').hide();            
                  $('#success_Msg').append('product has been added to wishlist');
                  $('#wishlistCount').html("<i class='fa fa-star __web-inspector-hide-shortcut__'></i> Wishlist ("+wishlistCount+") ");
                  $('#success_Msg').fadeToggle("slow");
               }
           });
        });
   });

</script>
<section id="detailsProduct">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                <div class="details_div_img">
                   <div class="zoom details_pro_img " id='ex1'>
                       <img src="{{asset($productInfo->productImage)}}" class="img-responsive">
                    </div>
                </div>
                </div>
               <div class="col-md-4 col-sm-4">
              <div id="successMsg" class="alert alert-info"></div>
              <div id="success_Msg" class="alert alert-success"></div>
               <h4 class="pro_title">
                {{ $productInfo->productName }}
               </h4>
               <p>BDT: <b class="">{{ $productInfo->productPrice }} </b></p>
               <p>Availability: {{ $productInfo->productQuantity }}</p>
               @if(session('error_message')) <div class ='alert alert-danger'> {{session('error_message')}}</div>  @endif
               <p>Category: <b class="">{{$categoryName->categoryName}}</b></p>
               <p>Brand: <b class="">{{$brandName->manufacturerName}}</b></p>
               
               <!--<form class="form-inline" action="{{URL::to('/add-to-cart')}}" method="post">
                   {{ csrf_field() }}-->
                 <div class="form-group">
                     <input type="number" id="product_qty" name="product_qty" min="1" class="form-control qty" id="exampleInputName2" value="1">
                     <input type="hidden" id="pro_id" name="product_id" value="{{$productInfo->id}}">
                 </div>

                   <button id="addCartBtn" name="submit" class="btn  lal">Add To Cart</button>

               <!-- </form>-->

               <div class="wishAndcompare">
                 


<?php
$customerId = Session::get('customerId');
         if($customerId != NULL){
           ?>
               <div class="w_compare">
               <!--<form class="form" action="{{ url('/add-to-wishlist') }}" method="post">
                   {{ csrf_field()}}-->
                 <div class="form-group">
                   <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                 </div>
                   <button type="submit" name="compare" id="wishBtn" class="btn btn-default add-to-cart">Add To Wishlist</button>
              <!-- </form>-->
               </div>
<?php } ?>
               </div>
               </div>


               <div class="col-md-12 col-sm-12">
               <h2>Product Details</h2>
                                  <hr style="border:1px solid #fff">
              {!! $productInfo->productLongDescription !!}
               </div>

            </div>
        </div>
    </section>
@endsection