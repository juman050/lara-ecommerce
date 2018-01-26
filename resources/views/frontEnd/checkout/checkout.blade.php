@extends('frontEnd.master')
@section('title')
 Checkout
@endsection
@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well lead text-center">You have to login to complete your valuable order. If you are not registered then please Sign Up first.</div>
        </div>
    </div>
</div>
<section id="featuredProduct">
      <div class="container">
        <div class="row contact">
            @if (count($errors) > 0)
                    <div class="show-error">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                @endif
        <div class="col-md-6">

            <form class="" name="shipping-info" action="{{ url('/checkout/sign-up') }}" method="POST">
          {{ csrf_field() }}
        <fieldset>
           

        <!-- Form Name -->
        <legend>Register Here</legend>
        
        <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstName" placeholder="Your name..">
    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastName" placeholder="Your last name..">
    
     <label for="email">Email</label>
    <input type="email" id="email" name="emailAddress" placeholder="Your Email Address..">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Your Password..">
    
        <label for="address">Address</label>
    <textarea id="address" name="address" placeholder="Write something.." style="height:100px"></textarea>

    <label for="phoneNumber">Mobile Number</label>
    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Your Mobile Number..">

    <label for="city">City</label>
    <select id="city" name="districtName">
        <option>Select Your City</option>
            <option value="SY">Sylhet</option>
            <option value="DH">Dhaka</option>
            <option value="KL">Khulna</option>  
            <option value="RJ">Rajshahi</option>  
            <option value="CH">Chittagong</option>  
    </select>



    <input type="submit" value="Create Account">

        </fieldset>
        </form>

    </div>
    <div class="col-md-6">
      <form class="form-horizontal" action="{{ url('/Customer-auth') }}" method="POST">
          {{ csrf_field() }}
        <fieldset>
            <?php 
                    $exception = Session::get('exception');
                    if($exception){ ?>
                <div class="alert alert-danger text-center">
                       {{ $exception }}
                    </div>
                        
                        
                <?php   Session::put('exception',''); }
               ?>
            
        <!-- Form Name -->
        <legend>Login Here</legend>
        
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Email</label>
        <div class="col-md-6">
        <input id="textinput" name="emailAddress" placeholder="Enter your Email..." class="f input-md"  type="email">
             </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Password</label>
        <div class="col-md-6">
        <input id="textinput" name="password" placeholder="Enter your Password" class=" input-md"  type="password">
          </div>
        </div>



        <!-- Button -->
        <div class="form-group">
        <label class="col-md-6 control-label" for="singlebutton"> </label>
        <div class="col-md-6">
          <button id="singlebutton" name="singlebutton" class="btn btn-success lal">LogIn</button>
        </div>
        </div>

        </fieldset>
        </form>
    </div>
    </div>
    </div>

</section>
@endsection