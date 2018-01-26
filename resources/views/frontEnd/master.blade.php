<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('public/site/css/slicknav.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('public/site/css/responsive.css') }}">
        <script src="{{ asset('public/site/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <script src="{{ asset('public/site/js/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('public/site/js/jquery-ui.js') }}"></script>
        
        <script type="text/javascript">
            <?php $pros = DB::table('products')->where('publicationStatus',1)->get();?>
            $( function(){
                var $ = jQuery;
                 var source = [
                        @foreach($pros as $pro)
                       { value: "<?php echo url('/');?>/product-details/<?php echo $pro->id;?>",
                           label: "<?php echo $pro->productName;?>"
                       },
                       @endforeach
                    ];
                $("#productName").autocomplete({
                    
                    source: source,
                    select: function(event, ui){
                        window.location.href = ui.item.value;
                    }
                });
                
           });
        </script>
    </head>
    <body>
         <!-- header -->
        @include('frontEnd.includes.header')
        <!-- //header-bot -->
        <!-- banner -->
        @include('frontEnd.includes.menu')
        
        <!-- maincontent -->
       @yield('mainContent')
       
       @if(Session::get('customerId') != Null)
            @include('frontEnd.includes.recommended')
       @endif
       
        <!-- footer -->
       @include('frontEnd.includes.footer')




        




    <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

       
        
        <script src="{{ asset('public/site/js/bootstrap.min.js') }}"></script>
        <script src='{{ asset('public/site/js/jquery.zoom.js') }}'></script>
        <script src="{{ asset('public/site/js/jquery.backtotop.js') }}"></script>
        <script src="{{ asset('public/site/js/main.js') }}"></script>
        

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
