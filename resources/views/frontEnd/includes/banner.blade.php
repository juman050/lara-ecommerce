 <section class="slide-wrapper">
        <div class="container">
       
            <div id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                 </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php 
                        $featuredProduct = DB::table('products')->where('isFeatured',1)->get();
                        $counter=1;
                     ?>
                @foreach($featuredProduct as $slide)
                    <div class="item item3 <?php if($counter <= 1){echo " active"; } ?>">
                        <div class="fill">
                            <div class="inner-content">
                                <div class="col-md-6">

                                    <div class="carousel-img">
                                        <img src="{{ $slide->productImage }}" alt="" class="img img-responsive">
                                    </div>
                                </div>

                                <div class="col-md-6 text-left">
                                    <div class="carousel-desc">
                                        <h3 class="">{{ $slide->productName }}</h3>
                                        <p style="color:#1c2529"> <b>BDT {{ $slide->productPrice }}</b></p>
                                        {!! $slide->productShortDescription !!}
                                        <br>
                                        <p>
                                            <a href="{{URL::to('product-details/'.$slide->id)}}" class="btn btn-default add-to-cart">Details</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $counter++; ?>
                @endforeach
                </div>
            </div>

        </div>
    </section>
