<?php

namespace App\Http\Controllers;
use App\Category;
use App\Manufacturer;
use Illuminate\Support\Facades\Input;
use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $categoryInfo = Category::where('publicationStatus',1)->get();
        $brandInfo = Manufacturer::where('publicationStatus',1)->get();
        $featuredproductInfo =  Product::where(['publicationStatus'=>1,'isFeatured'=>1])->simplePaginate(9);
        $productInfo =  Product::where('publicationStatus',1)->simplePaginate(9);
        return view('frontEnd.home.homeContent',['all_published_product'=>$productInfo,'categoryInfo'=>$categoryInfo,'brandInfo'=>$brandInfo,'featuredproductInfo'=>$featuredproductInfo]);
    }

    public function products() {
        $categoryInfo = Category::where('publicationStatus',1)->get();
        $brandInfo = Manufacturer::where('publicationStatus',1)->get();
        $productInfo =  Product::where('publicationStatus',1)->simplePaginate(9);
        return view('frontEnd.product.index',['all_published_product'=>$productInfo,'categoryInfo'=>$categoryInfo,'brandInfo'=>$brandInfo]);
    }

    public function contact() {
         return view('frontEnd.contact.contact');
    }
    public function category($id) {
        $categoryProductInfo =  Product::where('categoryId',$id)->simplePaginate(8);
        return view('frontEnd.category.categoryContent',['category_products'=>$categoryProductInfo]);
    }
    public function brand($id) {
        $manufacturerProductInfo =  Product::where('manufacturerId',$id)->simplePaginate(8);
        return view('frontEnd.manufacturer.manufacturerContent',['brand_products'=>$manufacturerProductInfo]);
    }
    public function productDetails($id) {
        $productInfo =  Product::where('id',$id)->first();
        $categoryId = $productInfo->categoryId;
        $categoryName =  Category::where('id',$categoryId)->first();
        $brandId = $productInfo->manufacturerId;
        $brandName = Manufacturer::where('id',$brandId)->first();
        return view('frontEnd.product.productDetails',['categoryName'=>$categoryName,'brandName'=>$brandName,'productInfo'=>$productInfo]);
    }
    public function search() {
        $search = Input::get('search');
        $categoryInfo = Category::where('publicationStatus',1)->get();
        $productInfo =  Product::where('productName','like','%'.$search.'%')->paginate(4);
        return view('frontEnd.home.homeContent',['all_published_product'=>$productInfo,'categoryInfo'=>$categoryInfo]);
    }
}
