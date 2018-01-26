<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Manufacturer;
use Session;
use Illuminate\Support\Facades\Redirect;
class ManufacturerController extends Controller
{
    public function createManufacturer() {
        return view('admin.manufacturer.createManufacturer');
    }
    public function saveManufacturerInfo(Request $request) {
        $this->validate($request, [
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
            'publicationStatus' => 'required',
        ]);
        $image = $request->file('manufacturerImage');
        if($image){
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fullname = $image_name.'.'.$ext;
            $upload_path = 'public/manufacturerImages/';
            $image_url = $upload_path.$image_fullname;
            $success = $image->move($upload_path,$image_fullname);
            if($success){
                    $manufacturer = new Manufacturer();
                    $manufacturer->manufacturerName = $request->manufacturerName;
                    $manufacturer->manufacturerDescription = $request->manufacturerDescription;
                    $manufacturer->manufacturerImage = $image_url;
                    $manufacturer->publicationStatus = $request->publicationStatus;
                    $manufacturer->save();
                    return redirect('/add-manufacturer')->with('message', "Manufacturer info save successfully");
            }
        }else{
                    $manufacturer = new Manufacturer();
                    $manufacturer->manufacturerName = $request->manufacturerName;
                    $manufacturer->manufacturerDescription = $request->manufacturerDescription;
                    $manufacturer->publicationStatus = $request->publicationStatus;
                    $manufacturer->save();
                    return redirect('/add-manufacturer')->with('message', "Manufacturer info save successfully");
        }
        
    }
    public function manageManufacturer() {
        $manufacturers = Manufacturer::all()->sortByDesc('id');
        return view('admin.manufacturer.manageManufacturer',['manufacturers' => $manufacturers]);
    }
    public function editManufacturer($id) {
        $manufacturerInfo = Manufacturer::where('id', $id)->first();
        return view('admin.manufacturer.editManufacturer')->with('manufacturerInfo',$manufacturerInfo);
    }
    public function updateManufacturer() {
        
    }
    public function unpublishedManufacturer($id) {
        $manufacturerInfo = Manufacturer::find($id);
        $manufacturerInfo->publicationStatus = 0;
        $manufacturerInfo->save();
        return redirect()->back();
    }
    public function publishedManufacturer($id) {
        $manufacturerInfo = Manufacturer::find($id);
        $manufacturerInfo->publicationStatus = 1;
        $manufacturerInfo->save();
        return redirect()->back();
    }
    public function deleteManufacturer($id) {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manage-manufacturer')->with('msg', 'Manufacturer info delete successfully');
    }
}
