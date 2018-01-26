@extends('frontEnd.master')
@section('title')
 Shipping Info
@endsection
@section('mainContent')
<section id="featuredProduct">
      <div class="container">
        <div class="row">
        <div class="col-md-8">

<form class="form-horizontal" name="shippingInfo" action="{{url('/update-profile')}}" method="POST">
    {{csrf_field()}}    
    <fieldset>
@if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <!-- Form Name -->
        <legend>Profile Details Here </legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">First Name</label>
        <div class="col-md-6">
        <input id="textinput" name="firstName" value="{{$customerById->firstName}}" class="form-control input-md" required="" type="text">
        <span class="help-block"> </span>
        </div>
        </div>

         <div class="form-group">
        <label class="col-md-6 control-label" for="textinput">Last Name</label>
        <div class="col-md-6">
        <input id="textinput" name="lastName" value="{{$customerById->lastName}}" class="form-control input-md" required="" type="text">
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
        <label class="col-md-6 control-label" for="textinput">Password</label>
        <div class="col-md-6">
        <input id="textinput" name="password" placeholder="Enter new password if you want to change" class="form-control input-md" type="password">
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