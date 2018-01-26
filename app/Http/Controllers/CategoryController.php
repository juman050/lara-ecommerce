<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Session;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
     public function add_category() {
        $this->checkAuth();
        return view('admin.category.add_category');
    }
    public function add_category_info(Request $request) {  
        $this->checkAuth();
        $this->validate($request, [
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ]);
        $category = new Category();
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect()->back()->with('message', "Category info save successfully");
    }
    public function manage_category() {
        $this->checkAuth();
        $categories = Category::all()->sortByDesc('id');
        return view('admin.category.manage_category',['categories' => $categories]);
    }
    public function unpublished_category($id) {
        $this->checkAuth();
        $categoryInfo = Category::find($id);
        $categoryInfo->publicationStatus = 0;
        $categoryInfo->save();
        return redirect()->back();
    }
    public function published_category($id) {
        $this->checkAuth();
        $categoryInfo = Category::find($id);
        $categoryInfo->publicationStatus = 1;
        $categoryInfo->save();
        return redirect()->back();
    }
    public function edit_category($id) {
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.edit_category', ['categoryById' => $categoryById]);
    }
    public function update_category(Request $request) {
        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->publicationStatus = $request->publicationStatus;
        $category->save();
        return redirect('/manage-category')->with('message', "Category info update successfully");
    }
    public function delete_category($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect('/manage-category')->with('msg', 'Category info delete successfully');
    }
    public function checkAuth() {
         $admin_id = Session::get('admin_id');
         if($admin_id == NULL){
             return Redirect::to('/admin')->send();
         }
    }
}
