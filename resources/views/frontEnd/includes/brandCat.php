            <div class="col-md-4 col-xs-12">
            <div class="row">
              <div class="col-md-12 col-sm-12">
                  <br>
                  <form class="form-inline" action="{{ url('/search') }}" method="GET" id="search">
                       
                    <div class="form-group">
                      <div class="input-group search_input">
                        <input type="text" name="search" required="" class="form-control" 
                             id="productName" placeholder="Search by product ...">  
                        <div class="input-group-addon ">
                            <button type="submit" class="btn-success"><span class="fa fa-search"></span></button>
                        </div>
                        {{csrf_field()}}
                      </div>
                    </div>
                   
                </form>
                <h4 class="cat_title">Categories</h4>
                <p class="widget-body">
                <?php foreach ($all_published_category as $value) {?>
                        <a href="{{ URL::to('/category-view/'.$value->id) }}"><span class="large label tag label-success">{{ $value->categoryName}}</span></a>
                 <?php   } ?>

                </p>

              </div>

              <div class="col-md-12 col-sm-12">
                <h4 class="cat_title">Brands</h4>
                <p class="widget-body">
                 
               <?php foreach ($all_published_manufacturer as $value) {?>
                        <a href="{{ URL::to('/brand-view/'.$value->id) }}"><span class="large label tag label-success">{{ $value->manufacturerName}}</span></a>
                 <?php   } ?>

                </p>

              </div>

            </div>
          </div>


