<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Cart;
use App\Wishlist;

class CartController extends Controller
{
    public function addToCart(Request $request,$id) {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('/show-cart');
        }
        $product_id = $id;
        $product_info = Product::where('id',$product_id)->first();
        if($request->qty){
            $product_qty = $request->qty;
        }else{
            $product_qty = 1;
        }
        
        if($product_qty<=$product_info->productQuantity){
        Cart::add([
            'id'=>$product_id,
            'name'=>$product_info->productName,
            'price'=>$product_info->productPrice,
            'qty'=>$product_qty,
            'options' => ['image' => $product_info->productImage,
                          'stockIn' => $product_info->productQuantity],
            
        ]);
        return redirect()->back()->with('message', "Product added to cart successfully.");
        }else{
            return redirect()->back()->with('error_message', "Your qty is more than stock.");
        }
    }
    public function showCart() {
        $cartProduct = Cart::content();
        return view('frontEnd.cart.cart',['cartProduct'=>$cartProduct]);
    }
    public function updateCart(Request $request,$rowId) {
        $id = $request->proid;
        $product_info = Product::where('id',$id)->first();
        $qty = $request->qty;
        if($qty<=$product_info->productQuantity){
            Cart::update($rowId, $qty); // Will update the quantity
            //$cartProduct = Cart::content(); // display all new data of cart
            session()->flash('message', 'Quantity was updated successfully!');
            return response()->json(['success' => true]);
            //return view('frontEnd.cart.upCart', compact('cartItems'))->with('message', 'Cart updated successfully');
            //return redirect()->back()->with('message', "Cart updated successfully");
        }else{
            session()->flash('error_message', "Your qty is more than stock.");
            return response()->json(['success' => true]);
            //return view('frontEnd.cart.cart')->with('error_message', "Your qty is more than stock.");
        }
       
    }
    public function deleteCartProduct($id) {
        Cart::remove($id);
        return redirect()->back()->with('message', "Cart deleted successfully");
    }
    public function clearCart()
    {
        Cart::destroy();
        return redirect()->back()->with('message', "Your cart has been cleared!");
    }
    public function switchToWishlist(Request $request,$rowId) {
        Cart::remove($rowId);
        $product_id = $request->productId;
        $customerId = $request->cmrId;
        $wishlist = new Wishlist();
        $wishlist->productId =  $product_id;
        $wishlist->customerId = $customerId;
        $wishlist->save();
        return redirect()->back()->with('message', "Add to wishlist successfully");
    }
}
