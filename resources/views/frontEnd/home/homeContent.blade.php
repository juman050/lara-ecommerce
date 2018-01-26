@extends('frontEnd.master')
@section('title')
    HOME
@endsection
@section('mainContent')
<script type="text/javascript">

$(document).ready(function(){
    <?php
        $max = count($all_published_product);
        for($i=0;$i<$max;$i++){
    ?>
    $('#successMsg<?php echo $i;?>').hide();
    $('#success_Msg<?php echo $i;?>').hide();
    <?php
        $customerId = Session::get('customerId');
        $totalwishlistCount = DB::table('wishlists')->where('customerId',$customerId)->count();
    ?>
        var wishlistCount = <?php echo $totalwishlistCount;  ?>;
        $('#wishBtn<?php echo $i;?>').click(function(){
           wishlistCount ++;
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
           $.ajax({
               type: 'get',
               url: '<?php echo url('/add-to-wishlist')?>/'+pro_id<?php echo $i;?>,
               success:function(){
                  $('#wishBtn<?php echo $i;?>').hide();
                  $('#success_Msg<?php echo $i;?>').append('product has been added to wishlist');
                  $('#wishlistCount').html("<i class='fa fa-star __web-inspector-hide-shortcut__'></i> Wishlist ("+wishlistCount+") ");
                  $('#success_Msg<?php echo $i;?>').fadeToggle("slow");
               }
           });
        });

        var itemCount = <?php echo Cart::count(); ?>;
        $('#cartBtn<?php echo $i;?>').click(function(){
            itemCount ++;
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
           $.ajax({
               type: 'get',
               url: '<?php echo url('/add-to-cart')?>/'+pro_id<?php echo $i;?>,
               success:function(){
                    $('#cartBtn<?php echo $i;?>').hide();
                    $('#successMsg<?php echo $i;?>').append('product has been added to cart');
                    $('#itemCount').html(" Cart ("+itemCount+") ");
                    $('#successMsg<?php echo $i;?>').fadeToggle("slow");
               }
           });
        });

    <?php } ?>
});

</script>

<!-- //banner-top -->
       @include('frontEnd.includes.banner')
        <!-- banner -->
<section id="featuredProduct">
  <div class="container">
    <div class="row">

      @include('frontEnd.includes.sidebar')
      <div class="col-md-9 col-sm-9 col-xs-12">
      <div class="product-items">
          <h2 class="title text-center">Latest Items</h2>
    <?php if($all_published_product->isEmpty()){?>
      <span class="text-danger">sorry no product available.</span>
   <?php }else { $countP=0; ?>
    @foreach(array_chunk($all_published_product->getCollection()->all(), 3) as $row)
    <div class="row">
        @foreach($row as $published_product)
        <div class="col-md-4 col-sm-4 col-xs-12">


            <div class="product-wrapper">

            <div class="single-products">

                <div class="productinfo">
                    <div class="featuredpro_img" >
                <img src="{{asset($published_product->productImage)}}">
              </div>

              <div class="featuredpro_descrip">
                <h5 class="featuredpro_title">
                  {{ $published_product->productName }}
                </h5>
                <p> <b>BDT {{ $published_product->productPrice }}</b></p>

                <p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add To Cart</a></p>

              </div>
                </div>
          <div class="product-overlay">
              <div id="success_Msg<?php echo $countP;?>" class="alert alert-success" style="border-radius:0px">
                  <a href="{{url('/show-wishlist')}}" class="text-danger">(view wishlist) </a>
              </div>
              <div id="successMsg<?php echo $countP;?>" class="alert alert-info" style="border-radius:0px">
                <a href="{{url('/show-cart')}}" class="text-warning">(view cart) </a>
              </div>
                    <div class="overlay-content">
                        <h2> <b>BDT {{ $published_product->productPrice }}</b> </h2>
                        <h4>{{ $published_product->productName }}</h4>
                        <p>
                        <!--<form class="form-inline" action="{{URL::to('/add-to-cart')}}" method="post">
                            {{ csrf_field() }}-->
                                 <div class="form-group">
                                     <input type="hidden" name="product_qty" class="form-control qty" id="exampleInputName2" value="1">
                                   <input type="hidden" id="pro_id<?php echo $countP;?>" name="product_id"  value="{{$published_product->id}}">
                                 </div>

                        <button id="cartBtn<?php echo $countP;?>" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>

                           <!--</form>-->
                        </p>
                        <p> <a href="{{URL::to('product-details/'.$published_product->id)}}" class="btn btn-success lal">Details</a></p>


<?php
$customerId = Session::get('customerId');
         if($customerId != NULL){
             ?><p>

               <!--<form class="form" action="{{ url('/add-to-wishlist') }}" method="post">
                   {{ csrf_field()}}-->
                 <div class="form-group">
                     <input type="hidden"  name="product_id" value="{{$published_product->id}}">
                 </div>

                 <button id="wishBtn<?php echo $countP;?>"  name="compare" class="btn btn-success lal">
                             <i class="fa fa-plus-square"></i> Add to wishlist</a>
                 </button>
              <!-- </form>-->
                    </p>
<?php } ?>
                    </div>
            </div>

            </div>

            </div>
        </div>
         <?php $countP++; ?>
         @endforeach
         </div>

    @endforeach
    {{ $all_published_product->appends(['defficulty'=>'beginer'])->links() }}
  <?php }?>

  <h2 class="title text-center">Featured Items</h2>
    <?php if($featuredproductInfo->isEmpty()){?>
      <span class="text-danger">sorry no product available.</span>
   <?php }else { $countP=0; ?>
    @foreach(array_chunk($featuredproductInfo->getCollection()->all(), 3) as $row)
    <div class="row">
        @foreach($row as $published_product)
        <div class="col-md-4 col-sm-4 col-xs-12">


            <div class="product-wrapper">

            <div class="single-products">

                <div class="productinfo">
                    <div class="featuredpro_img" >
                <img src="{{asset($published_product->productImage)}}">
              </div>

              <div class="featuredpro_descrip">
                <h5 class="featuredpro_title">
                  {{ $published_product->productName }}
                </h5>
                <p> <b>BDT {{ $published_product->productPrice }}</b></p>

                <p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add To Cart</a></p>

              </div>
                </div>
          <div class="product-overlay">
             
                    <div class="overlay-content">
                        <h2> <b>BDT {{ $published_product->productPrice }}</b> </h2>
                        <h4>{{ $published_product->productName }}</h4>
                        <p>
                        <!--<form class="form-inline" action="{{URL::to('/add-to-cart')}}" method="post">
                            {{ csrf_field() }}-->
                                 

                           <!--</form>-->
                        </p>
                        <p> <a href="{{URL::to('product-details/'.$published_product->id)}}" class="btn btn-success lal">Details</a></p>



                    </div>
            </div>

            </div>

            </div>
        </div>
         <?php $countP++; ?>
         @endforeach
         </div>

    @endforeach
    {{ $all_published_product->appends(['defficulty'=>'beginer'])->links() }}
  <?php }?>
   </div>
  </div>
  </div>
  </div>
</section>


<script type="text/javascript">

$(document).ready(function(){
// invoke the carousel
    $('#myCarousel').carousel({
      interval:6000
    });

// scroll slides on mouse scroll
$('#myCarousel').bind('mousewheel DOMMouseScroll', function(e){

        if(e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
            $(this).carousel('prev');


        }
        else{
            $(this).carousel('next');

        }
    });

//scroll slides on swipe for touch enabled devices

 	$("#myCarousel").on("touchstart", function(event){

        var yClick = event.originalEvent.touches[0].pageY;
    	$(this).one("touchmove", function(event){

        var yMove = event.originalEvent.touches[0].pageY;
        if( Math.floor(yClick - yMove) > 1 ){
            $(".carousel").carousel('next');
        }
        else if( Math.floor(yClick - yMove) < -1 ){
            $(".carousel").carousel('prev');
        }
    });
    $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
    });
});

});
//animated  carousel start
$(document).ready(function(){

//to add  start animation on load for first slide
$(function(){
		$.fn.extend({
			animateCss: function (animationName) {
				var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
				this.addClass('animated ' + animationName).one(animationEnd, function() {
					$(this).removeClass(animationName);
				});
			}
		});
			 $('.item3.active img').animateCss('slideInDown');
			 $('.item3.active h2').animateCss('zoomIn');
			 $('.item3.active p').animateCss('fadeIn');

});

//to start animation on  mousescroll , click and swipe



     $("#myCarousel").on('slide.bs.carousel', function () {
		$.fn.extend({
			animateCss: function (animationName) {
				var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
				this.addClass('animated ' + animationName).one(animationEnd, function() {
					$(this).removeClass(animationName);
				});
			}
		});

// add animation type  from animate.css on the element which you want to animate


		$('.item3 img').animateCss('fadeInLeft');
		$('.item3 h2').animateCss('fadeInDown');
		$('.item3 p').animateCss('fadeIn');
    });
});

</script>
@endsection
