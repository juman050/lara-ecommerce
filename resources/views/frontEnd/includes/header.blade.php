
<section id="header">
      <div class="container">
        <div class="row">
              <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="{{ URL::to('/') }}"><h3 class="logo">Lara<span class="half_color">Ecommerce</span></h3></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
              
            <ul class="nav navbar-nav">
            
            </ul>
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                  <?php $customerId = Session::get('customerId');
                  if($customerId!=null){?>
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-user"></span> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/customer-profile') }}">Profile</a></li>
                  <li><a href="{{url('/customer-logout')}}">Logout</a></li>
                </ul>
              </li>
              <?php    } else{ ?>
                  <li><a href="{{url('/checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
              <?php }
                    ?>
               

              <li class="cart" >
                  <span ></span>
                          <a id="itemCount" href="{{ url('/show-cart') }}" class="dropdown-toggle fa fa-shopping-cart " >
                              <span>Cart  <?php if(Cart::count()>0){ echo "(".Cart::count().")"; }else{
                                  echo " ";
                              } ?>
                      </span></a>
            <!--  if(Cart::count()>0){?>
                <ul class="dropdown-menu">
                     <li>
                   
        <table class="table ">
            <thead>
                <tr>
                <th width='30%'>Name</th>
                <th width='20%'>Image</th>
                <th width='20%'>Price</th>
                <th width='15%'>Qty</th>
                <th width='15%'>Action</th>
                </tr>
            </thead>
        <tbody>
              $total = 0 ;
    @foreach(Cart::content() as $carts)
        <tr>
            <td>{{ $carts->name }}</td>
           <td>
            <img src="{{ ($carts->options->image) }}" width="40px" height="40px">
            </td>
            </td>
            <td>TK {{ $carts->price }}</td>
            <td>
            {{ $carts->qty }}
            </td>
           
                $itemTotal = $carts->qty*$carts->price 
           
            <td>
            <a onclick="return confirm('Are you sure want to delete?')"  href="{{ url('/delete-cart/'.$carts->rowId) }}">
            <button class="btn btn-info">
            <span class="fa fa-trash" aria-hidden="true"></span>
            </button>
            </a>
            </td>
        </tr>
          $total = $total + $itemTotal 
     @endforeach

        </tbody>

        </table>
         <aside style="padding: 10px;">
            <p>
                <strong>Total:</strong> TK  echo $total; ?>
            </p>
            <p>
               <strong>Vat:</strong> 12%
            </p>
            <p >
                <strong>Grand Total:</strong> 
               
                       Tk.  echo $grandTotal = $total + $total*.12;                  
                        Session::put('orderTotal',$grandTotal);  ?> 

            </p>
           <p>
                
               <a href="{{url('/show-cart')}}"  class="btn btn-info lal pull-right">
                        MyCart
                        </a>

                   
                     $count =Cart::count(); 
                    if($count>0){
                        $customerId = Session::get('customerId');
                        $shippingId = Session::get('shippingId');
                        if ($customerId != null && $shippingId != null) {
                    ?>
                        <a href="{{url('/checkout-payment')}}">
                         <button class="btn btn-success">Payment</button>
                        </a>
                      } else if ($customerId != null) { ?>
                    <a href="{{ url('/shipping-info') }}"><button class="btn btn-success">Shipping</button></a>                
                 } else { ?>
                    <a href="{{url('/checkout')}}">
                         <button class="btn btn-success">Checkout</button>
                        </a>
                    }} ?>
                
             </p>
                         </div>

                     </li>
                                                                        
                </ul>
                   } ?>
            -->
	     </li>
            </ul>
          </aside><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>    
        </div>
      </div>
    </section>