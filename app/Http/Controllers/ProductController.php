<?php

namespace App\Http\Controllers;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createProduct() {
       $categoryInfo =  Category::where('publicationStatus',1)->get();
       $manufacturerInfo =  Manufacturer::where('publicationStatus',1)->get();
       return view('admin.product.createProduct',['all_published_category'=>$categoryInfo,'all_published_manufacturer'=>$manufacturerInfo]);
    }
    public function saveProductInfo(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'categoryId' => 'required',
            'manufacturerId' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productShortDescription' => 'required',
            'productLongDescription' => 'required',
            'productImage' => 'required',
            'publicationStatus' => 'required',
        ]);
        $productImage = $request->file('productImage');
        $image_name = str_random(20);
        $ext = strtolower($productImage->getClientOriginalExtension());
        $image_fullname = $image_name.'.'.$ext;
        $upload_path = 'public/productImages/';
        $image_url = $upload_path.$image_fullname;
        $productImage->move($upload_path,$image_fullname);
        $product = new Product();
        $product->productName = $request->productName;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productShortDescription = $request->productShortDescription;
        $product->productLongDescription = $request->productLongDescription;
        $product->productImage = $image_url;
        $product->publicationStatus = $request->publicationStatus;
        $product->isFeatured = $request->isFeatured;
        $product->save();
        return redirect()->back()->with('message', "Product info save successfully");
    }
    public function manageProductInfo() {
        $products = Product::all()->sortByDesc('id');
        return view('admin.product.manageProduct',['products' => $products]);
    }
    public function editProduct($id) {

        $categories = Category::where('publicationStatus', 1)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $productById = Product::where('id', $id)->first();
       //  return view('admin.product.editProduct', ['productById' => $productById, 'categories' => $categories, 'manufacturers' => $manufacturers]);
        return view('admin.product.editProduct')
                        ->with('productById', $productById)
                        ->with('categories', $categories)
                        ->with('manufacturers', $manufacturers);
    }
    public function updateProductInfo(Request $request) {
        $this->validate($request, [
            'productName' => 'required',
            'categoryId' => 'required',
            'manufacturerId' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productShortDescription' => 'required',
            'productLongDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
       
        $proid = $request->Id;
        $productById = DB::table('products')->where('id',$proid)->first();
        $productImage = $request->file('productImage');
        $unlinkproductImage = $productById->productImage;
        if($request->hasFile('productImage')) {
            unlink($unlinkproductImage);
            $productImage = $request->file('productImage');
            $image_name = str_random(20);
            $ext = strtolower($productImage->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $upload_path = 'public/productImages/';
            $productImage->move($upload_path,$image_fullname);
            $imageUrl = $upload_path.$image_fullname;
        }
        else {
            $imageUrl = $productById->productImage;
        }
        DB::table('products')->where('id', $proid)->update([
            'productName' => $request->productName,
            'categoryId' =>  $request->categoryId,
            'manufacturerId' => $request->manufacturerId,
            'productPrice' => $request->productPrice,
            'productQuantity' => $request->productQuantity,
            'productShortDescription' => $request->productShortDescription,
            'productLongDescription' => $request->productLongDescription,
            'productImage' => $imageUrl,
            'publicationStatus' => $request->publicationStatus,
            'isFeatured' => $request->isFeatured
        ]);
        return redirect('/manage-product')->with('msg', "Product info Updated successfully");
    }
    public function deleteProduct($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/manage-product')->with('msg', 'Product info delete successfully');
    }
    public function unpublishedProduct($id) {
        $product = Product::find($id);
        $product->publicationStatus = 0;
        $product->save();
        return redirect()->back();
    }
    public function publishedProduct($id) {
        $product = Product::find($id);
        $product->publicationStatus = 1;
        $product->save();
        return redirect()->back();
    }

}
