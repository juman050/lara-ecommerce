<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="left-sidebar">
            <h2>Category</h2>

            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                @foreach($categoryInfo as $item)
                
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{ URL::to('/category-view/'.$item->id) }}">{{ $item->categoryName }}</a></h4>
                            </div>
                    </div>
                @endforeach

            </div><!--/category-productsr-->

            <div class="brands_products"><!--brands_products-->
                    <h2>Brands</h2>
                    <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brandInfo as $item)
                                    <li><a href="{{ URL::to('/brand-view/'.$item->id) }}">{{ $item->manufacturerName }}</a></li>
                                @endforeach
                            </ul>
                    </div>
            </div><!--/brands_products-->



    </div>
  </div>