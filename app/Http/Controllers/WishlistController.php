<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Wishlist;
use App\Product;
use DB;
use Cart;
class WishlistController extends Controller
{
    public function addToWishlist(Request $request,$id) {
        $product_id = $id;
        $customerId = Session::get('customerId');
        $wishlist = new Wishlist();
        $wishlist->productId =  $product_id;
        $wishlist->customerId = $customerId;
        $wishlist->save();
        return redirect()->back();
    }
    public function showWishlist() {
        $customerId = Session::get('customerId');
        $wishlist = DB::table('wishlists')
            ->leftjoin('products','wishlists.productId' , '=', 'products.id')
            ->select('products.*','wishlists.id as wishlist_id')
            ->where('wishlists.customerId',$customerId)
            ->get();
        return view('frontEnd.wishlist.wishlist',['wishlists' => $wishlist]);
    }
    public function deleteWishlist($id) {
        Wishlist::find($id)->delete();
        return redirect()->back()->with('message', "Wishlist deleted successfully.");
    }
    public function switchToCart(Request $request,$id) {
        Wishlist::find($id)->delete();
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return Redirect('/show-cart')->with('message', "Product already added to cart!");
        }
        $product_id = $request->productId;;
        $product_info = Product::where('id',$product_id)->first();
        $product_qty = 1;
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
    public function clearWishlist()
    {
        $customerId = Session::get('customerId');
        Wishlist::Where('customerId',$customerId)->delete();
        return redirect()->back()->with('message', "Your wishlist has been cleared!");
    }
}
