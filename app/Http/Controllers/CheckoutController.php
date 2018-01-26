<?php

namespace App\Http\Controllers;
use App\Customer;
use Session;
use DB;
use App\Shipping;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use App\Product;
use App\OrderDetail;
use Cart;
class CheckoutController extends Controller
{
    private function user_auth_check() {
        $customerId = Session::get('customerId');
         if($customerId == NULL){
             return Redirect::to('/checkout')->send();
         }
    }
    public function checkout() {
        $customerId = Session::get('customerId');
         if($customerId != NULL){
             return Redirect::to('/')->send();
         }
        return view('frontEnd.checkout.checkout');
    }
    public function customerRegistration(Request $request) {
        $this->validate($request, [
            'firstName'=>'required',
            'lastName'=>'required',
            'emailAddress'=>'required',
            'password'=>'required',
            'address'=>'required',
            'phoneNumber'=>'required',
            'districtName'=>'required',
        ]);
        $customer = new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName  = $request->lastName;
        $customer->emailAddress = $request->emailAddress;
        $customer->password = md5($request->password);
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->districtName = $request->districtName;
        $customer->save();
        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        return redirect('/shipping-info');
    }
    public function CustomerLogin(Request $request) {
        $this->validate($request, [
            'emailAddress'=>'required',
            'password'=>'required'
        ]);
        $email = $request->input('emailAddress');
        $password = md5($request->input('password'));
        $customerInfo = DB::table('customers')->where('emailAddress',$email)
                                   ->where('password',$password)
                                   ->first();
         if($customerInfo){
             Session::put('customerId',$customerInfo->id);
             return Redirect::to('/');
         }else{
             Session::put('exception','Your Email Or Password Invalide !');
             return Redirect::to('/checkout');
         }
    }
    public function showShippingForm() {
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.checkout.shipping', ['customerById' => $customerById]);
    }
    public function customerProfile()
    {
        $this->user_auth_check();
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id', $customerId)->first();
        return view('frontEnd.customer.profile', ['customerById' => $customerById]);
    }
    public function updateProfile(Request $request)
    {
        $this->user_auth_check();
        if ($request->password) {
            DB::table('customers')->where('id', Session::get('customerId'))->update(array(
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'emailAddress' => $request->emailAddress,
            'password' => md5($request->password),
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'districtName' => $request->districtName

           ));
        }else{
            DB::table('customers')->where('id', Session::get('customerId'))->update(array(
            'firstName' => $request->firstName,
            'lastName'  => $request->lastName,
            'emailAddress' => $request->emailAddress,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'districtName' => $request->districtName

           ));
        }

        return redirect()->back()->with('message','Profile updated successfully!');
    }
    public function saveShippingInfo(Request $request) {
        $this->user_auth_check();
        $shipping = new Shipping();
        $shipping->fullName = $request->fullName;
        $shipping->emailAddress = $request->emailAddress;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();
        $shippingId = $shipping->id;
        Session::put('shippingId', $shippingId);
        return redirect('/checkout-payment');
    }

    public function showPaymentForm() {
        $this->user_auth_check();
        $this->user_auth_check();
        $customerId = Session::get('customerId');
        $customerById = Customer::where('id',$customerId)->first();
        return view('frontEnd.checkout.paymentContent',['customerById'=>$customerById]);
    }
    public function saveOrderInfo(Request $request) {
       $this->user_auth_check();
        $paymentType = $request->paymentType;
        if($paymentType=='cashOnDelivery'){
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');

            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            $orderDetail = array();
            $cartProducts = Cart::content();
            foreach($cartProducts as $cartProduct) {
                $orderDetail['orderId'] = Session::get('orderId');
                $orderDetail['productId'] = $cartProduct->id;
                $orderDetail['productName'] = $cartProduct->name;
                $orderDetail['productPrice'] = $cartProduct->price;
                $orderDetail['productQuantity'] = $cartProduct->qty;
                DB::table('order_details')->insert($orderDetail);
                $updateStock = Product::find($cartProduct->id);
                if($updateStock) {
                    $updateStock->productQuantity = $updateStock->productQuantity-$cartProduct->qty;
                    $updateStock->save();
                }
              }
            Cart::destroy();
            Session::put('shippingId','');
            return redirect('/checkout/my-home');
        }else if($paymentType=='bkash'){
            echo 'Bkash';
        }else if($paymentType=='paypal'){
            $order = new Order();
            $order->customerId = Session::get('customerId');
            $order->shippingId = Session::get('shippingId');
            $order->orderTotal = Session::get('orderTotal');

            $order->save();
            $orderId = $order->id;
            Session::put('orderId', $orderId);

            $payment = new Payment();
            $payment->orderId = Session::get('orderId');
            $payment->paymentType = $paymentType;
            $payment->save();

            $orderDetail = array();
            $cartProducts = Cart::content();
            foreach($cartProducts as $cartProduct) {
                $orderDetail['orderId'] = Session::get('orderId');
                $orderDetail['productId'] = $cartProduct->id;
                $orderDetail['productName'] = $cartProduct->name;
                $orderDetail['productPrice'] = $cartProduct->price;
                $orderDetail['productQuantity'] = $cartProduct->qty;
                DB::table('order_details')->insert($orderDetail);
                $updateStock = Product::find($cartProduct->id);
                if($updateStock) {
                    $updateStock->productQuantity = $updateStock->productQuantity-$cartProduct->qty;
                    $updateStock->save();
                }
            }

              return view('frontEnd.checkout.paypal');
        }else{
            echo 'lol';
        }
    }
    public function cancelOrderInfo()
    {
       $orderId = Session::get('orderId');
       $cancelorder = DB::table('orders')->where('id', $orderId)->delete();
       DB::table('order_details')->where('orderId', $orderId)->delete();
       Session::put('orderId','');
       return Redirect('/');
    }
    public function customerHome() {
        $this->user_auth_check();
        return view('frontEnd.customer.customerHome');
    }
    public function logout() {
        Session::put('customerId','');
        Session::put('shippingId','');
        return back();
    }
}
