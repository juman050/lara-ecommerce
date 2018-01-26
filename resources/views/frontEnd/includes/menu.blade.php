    <section id="menu">
        <div class="container navpad">
            <div class="row">
                <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                      <ul class="nav navbar-nav">
                        <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{ URL::to('/home') }}">Home</a></li>
                        
                        <li><a href="{{url('/products')}}">Products</a></li>
                        <?php
                            $customerId = Session::get('customerId');
                            if($customerId != Null){
                            $count = DB::table('wishlists')->where('customerId',$customerId)->count();
                        ?>
                        <li class="{{ Request::segment(1) === 'show-wishlist' ? 'active' : null }}">
                        <a id="wishlistCount"  href="{{ URL::to('/show-wishlist') }}" ><i class="fa fa-star __web-inspector-hide-shortcut__"></i> Wishlist {{$count>0?'('.$count.')':''}}</a></li>
                            <?php } ?>
                        <li class="{{ Request::segment(1) === 'contact-us' ? 'active' : null }}"><a href="{{ URL::to('/contact-us') }}">Contact</a></li>
                        
                        

                      </ul>
                    
                      <form class="searchform navbar-right" action="{{ url('/search') }}" method="GET" id="search">
                           {{csrf_field()}}
                          <input type="text" id="productName" name="search" required="" placeholder="Search here...">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </form>
                       
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </section>