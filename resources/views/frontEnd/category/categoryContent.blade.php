@extends('frontEnd.master')
@section('title')
View Category
@endsection
@section('mainContent')
<script type="text/javascript">
    
$(document).ready(function(){
    <?php 
        $max = count($category_products);
        for($i=0;$i<$max;$i++){
    ?>
    $('#successMsg<?php echo $i;?>').hide();
    $('#success_Msg<?php echo $i;?>').hide();
        $('#wishBtn<?php echo $i;?>').click(function(){
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
           
           $.ajax({
               type: 'get',
               url: '<?php echo url('/add-to-wishlist')?>/'+pro_id<?php echo $i;?>,
               success:function(){
                  $('#wishBtn<?php echo $i;?>').hide();            
                  $('#success_Msg<?php echo $i;?>').append('product has been added to wishlist');
                  $('#success_Msg<?php echo $i;?>').fadeToggle("slow");
               }
           });
        });
        
        $('#cartBtn<?php echo $i;?>').click(function(){
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
           $.ajax({
               type: 'get',
               url: '<?php echo url('/add-to-cart')?>/'+pro_id<?php echo $i;?>,
               success:function(){
                  $('#cartBtn<?php echo $i;?>').hide();            
                  $('#successMsg<?php echo $i;?>').append('product has been added to cart');
                  $('#successMsg<?php echo $i;?>').fadeToggle("slow");
               }
           });
        });
    
    <?php } ?>
});

</script>
<section id="featuredProduct">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">

            <h2 class="featuredpro">Category products</h2>

      </div>
    </div>
     <?php if($category_products->isEmpty()){?>
      <span class="text-danger">sorry no product available.</span>
   <?php }else { $countP=0;?>
     @foreach(array_chunk($category_products->getCollection()->all(),4) as $row)
       <div class="row">
           @foreach($row as $category_product)
          <div class="col-md-3 col-sm-3 col-xs-6">
         
           
            <div class="product-wrapper">
                
            <div class="single-products">
                
                <div class="productinfo">
                    <div class="featuredpro_img" >
                <img src="{{asset($category_product->productImage)}}">
              </div>
                    
              <div class="featuredpro_descrip">
                <h5 class="featuredpro_title">
                  {{ $category_product->productName }}
                </h5>
                <p> <b>BDT {{ $category_product->productPrice }}</b></p>
                
                <p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add To Cart</a></p>
                
              </div>
                </div>
          <div class="product-overlay">
              <div id="successMsg<?php echo $countP;?>" class="alert alert-info" style="border-radius:0px"></div>
              <div id="success_Msg<?php echo $countP;?>" class="alert alert-success" style="border-radius:0px"></div>
                    <div class="overlay-content">
                        <h2> <b>BDT {{ $category_product->productPrice }}</b> </h2>
                        <h4>{{ $category_product->productName }}</h4>
                        <p> 
                        <!--<form class="form-inline" action="{{URL::to('/add-to-cart')}}" method="post">
                            {{ csrf_field() }}-->
                                 <div class="form-group">
                                     <input type="hidden" name="product_qty" class="form-control qty" id="exampleInputName2" value="1">
                                   <input type="hidden" id="pro_id<?php echo $countP;?>" name="product_id"  value="{{$category_product->id}}">
                                 </div>

                        <button id="cartBtn<?php echo $countP;?>" name="submit" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>

                           <!--</form>-->
                        </p>
                        <p> <a href="{{URL::to('product-details/'.$category_product->id)}}" class="btn btn-success lal">Details</a></p>
                        
                        
<?php
$customerId = Session::get('customerId');
         if($customerId != NULL){
             ?><p>
               
               <!--<form class="form" action="{{ url('/add-to-wishlist') }}" method="post">
                   {{ csrf_field()}}-->
                 <div class="form-group">
                     <input type="hidden"  name="product_id" value="{{$category_product->id}}">
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
     
    {{ $category_products->appends(['defficulty'=>'beginer'])->links() }}
    <?php }  ?>
  </div>
   
</section>
@endsection