<html>
    <head>
        <title>Payment</title>
        <script type="text/javascript" language="javascript">
            function paypal_submit(){
               var actionName = 'https://www.paypal.com/cgi-bin/webscr';
                //var actionName = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
                document.forms.frmOrderAutoSubmit.action=actionName;
                document.forms.frmOrderAutoSubmit.submit();
            }
        </script>
    </head>
    <body onload="paypal_submit();">
        <form style="padding: 0;margin:0;" name="frmOrderAutoSubmit"  method="post">

            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="orderId" value="{{ Session::get('orderId') }}">
            <input type="hidden" name="business" value="jumanLaravel@yahoo.com">

            <?php $count =0;?>
               @foreach(Cart::content() as $cartItem)
               <?php $count++; ?>
                <input type="hidden" name="item_name_{{$count}}" value="{{$cartItem->name}}">
                <input type="hidden" name="item_number_{{$count}}" value="{{$cartItem->id}}">
                <input type="hidden" name="quantity_{{$count}}" value="{{$cartItem->qty}}">
                <input type="hidden" name="amount_{{$count}}" value="{{$cartItem->price}}">
                <input type="hidden" name="shipping_{{$count}}" value="free">

                <input type="hidden" name="tax_{{$count}}" value="0.12">
            @endforeach
             <!-- after payment -->
                 <input type="hidden" name="return" id="return" value="{{url('/checkout')}}" />
                <!-- Cancel payment -->
                  <input type="hidden" name="cancel_return" id="cancel_return" value="{{ url('/cancelCheckout') }}" />
                  <br>
        </form>
        <?php
              Cart::destroy();
              Session::put('shippingId','');
              ?>
    </body>
</html>
