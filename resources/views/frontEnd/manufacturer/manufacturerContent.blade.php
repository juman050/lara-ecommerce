@extends('frontEnd.master')
@section('title')
View Brand
@endsection
@section('mainContent')
<section id="featuredProduct">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">

            <h2 class="featuredpro">Brand products</h2>

      </div>
    </div>
    <?php if($brand_products->isEmpty()){?>
      <span class="text-danger">sorry no product available.</span>
   <?php }else { ?>
     @foreach(array_chunk($brand_products->getCollection()->all(),4) as $row)
       <div class="row">
           @foreach($row as $brand_product)
          <div class="col-md-3 col-sm-3">
            <div class="panel panel-default items">
              <a href="{{URL::to('product-details/'.$brand_product->id)}}"  style="display:block;text-decoration:none;color:#000">
              <div class="panel-body">
                <div class="featuredpro_img">
                  <img src="{{ asset($brand_product->productImage) }}">
                </div>
                <div class="featuredpro_descrip">
                  <h4 class="featuredpro_title">
                   {{ $brand_product->productName }}
                  </h4>
                    <p>{!! $brand_product->productShortDescription !!}</p>
                  <p> <b>BDT {{ $brand_product->productPrice }}</b></p>
                  <p><button class="btn btn-default addcartb">Details</button></p>
                </div>
              </div>
            </a>
            </div>
          </div>
            @endforeach
         </div>
    @endforeach
     
    {{ $brand_products->appends(['defficulty'=>'beginer'])->links() }}
    <?php }  ?>
    
  </div>
   
</section>
@endsection