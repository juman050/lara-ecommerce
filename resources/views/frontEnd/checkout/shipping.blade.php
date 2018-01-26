@extends('frontEnd.master')
@section('title')
 Shipping Info
@endsection
@section('mainContent')
<section id="featuredProduct">
    <hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{ $customerById->lastName }}</b>. You have to give us product shipping information to complete your valuable order. If your product billing information & shipping information are same then just press on save shipping info button</div>
        </div>
    </div>
</div>
      <div class="container">
        <div class="row">
        <div class="col-md-8">

<form class="form-horizontal" name="shippingInfo" action="{{url('/checkout/save-shipping')}}" method="POST">
    {{csrf_field()}}    
    <fieldset>

        <!-- Form Name -->
        <legend>Shipping Details Here</legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Full Name</label>
        <div class="col-md-6">
        <input id="textinput" name="fullName" value="{{$customerById->firstName.' '.$customerById->lastName}}" class="form-control input-md" required="" type="text">
        <span class="help-block"> </span>
        </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Email Address</label>
        <div class="col-md-6">
        <input id="textinput" name="emailAddress" value="{{$customerById->emailAddress}}" class="form-control input-md" required="" type="text">
        <span class="help-block"> </span>
        </div>
        </div>



        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Mobile Number</label>
        <div class="col-md-6">
        <input id="textinput" name="phoneNumber" value="{{$customerById->phoneNumber}}" class="form-control input-md" required="" type="text">
        <span class="help-block"> </span>
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Address</label>
        <div class="col-md-6">
        <input id="textinput" name="address" value="{{$customerById->address}}" class="form-control input-md" required="" type="text">
        <span class="help-block"> </span>
        </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">City</label>
        <div class="col-md-6">
         <select class="form-control" name="districtName">
            <option value="SY">Sylhet</option>
            <option value="DH">Dhaka</option>
            <option value="KL">Khulna</option> 	
            <option value="RJ">Rajshahi</option> 	
            <option value="CH">Chittagong</option> 
                    </select>
        <span class="help-block"> </span>
        </div>
        </div>
        




        <!-- Button -->
        <div class="form-group">
        <label class="col-md-6 control-label" for="singlebutton"> </label>
        <div class="col-md-6">
            <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-success">Submit</button>
        </div>
        </div>

        </fieldset>
        </form>

    </div>

    </div>
    </div>

</section>
<script type="text/javascript">
    document.forms['shippingInfo'].elements['districtName'].value='<?php echo $customerById->districtName;?>'
</script>
@endsection