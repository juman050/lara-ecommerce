

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin || Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('public/site/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('public/site/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/backEnd/css/login.css')}}">
        <link rel="stylesheet" href="{{asset('public/site/css/responsive.css')}}">
    </head>
    <body>
        <section>
            <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <h1 class="text-center login-title">Sign in as Admin</h1>
            <div class="account-wall">
                
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
               <?php 
               $message = Session::get('message');
               if($message){ ?>
                    <div class="alert alert-success text-center">
                       {{ $message }}
                    </div>
             <?php Session::put('message',''); }
                    $exception = Session::get('exception');
                    if($exception){ ?>
                <div class="alert alert-danger text-center">
                       {{ $exception }}
                    </div>
                        
                        
                <?php   Session::put('exception',''); }
               ?>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            {!! Form::open(['url' => 'admin-login-check','class' =>'form-signin','method' => 'POST']) !!}
               {{ csrf_field() }}
                     <div class="form-group">
                         {!! Form::email('email', null, 
                                array( 'autofocus',
                                      'class'=>'form-control', 
                             'placeholder'=>'Enter Your Email')) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::password('password',
                                    array( 'class'=>'form-control', 
                                 'placeholder'=>'Enter Your Password')) !!}
                     </div>
                         <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
                        </div>
                   <button class="btn btn-md btn-success btn-block" type="submit">Sign in</button>
                 <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
            {!! Form::close() !!}
           

            </div>
            <a href="#" class="text-center new-account">Forget password?</a>
        </div>
        
    </div>
</div>
        </section>
    <section id="footer_bottom">
        <div class="container text-center">
            <div class="row">
                <br>
                <br>
                <br>
                <p class="copyright">Copyright &copy; <?php echo date('Y')?> - All Rights Reserved - <a href="#">MYSHOP</a></p>
            </div>
        </div>
    </section>
       
            
         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('public/site/js/vendor/jquery-1.11.3.min.js')}}"><\/script>')</script>
        <script src="{{asset('public/site/js/bootstrap.min.js')}}"></script>
    </body>
</html>
