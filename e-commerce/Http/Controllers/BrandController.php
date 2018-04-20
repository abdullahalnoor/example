<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function showBrandForm(){
        return view('admin.brand.add-brand');
    }
    
    public function saveBrandInfo(Request $request){
       $brand = new Brand();
       $brand->brand_name = $request->brand_name;
       $brand->brand_description = $request->brand_description;
       $brand->publication_status = $request->publication_status;
       $brand->save();
       
       return redirect('/brand/add-brand')->with('message', 'Brand info save successfully.');
    }
    
    public function manageBrandInfo(){
        //$brands = brand::all();
    	$brands = Brand::orderBy('id', 'desc')->get();
    	return $brands;

    	return view('admin.brand.manage-brand', ['brands' => $brands]);
    }
    
    public function unpublishedBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById->publication_status = 0;
        $brandById->save();
        
        return redirect('/brand/manage-brand')->with('message', 'Brand info unpublished successfully.');
    }
    
    public function publishedBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById->publication_status = 1;
        $brandById->save();
        
        return redirect('/brand/manage-brand')->with('message', 'Brand info published successfully.');
    }
    
    public function editBrandInfo($id){
        $brand = Brand::find($id);
        return view('admin/brand/edit-brand', ['brand' => $brand]);
    }
    
    public function updateBrandInfo(Request $request){
        $brandById = Brand::find($request->brand_id);
        $brandById->brand_name = $request->brand_name;
        $brandById->brand_description = $request->brand_description;
        $brandById->publication_status = $request->publication_status;
        $brandById->save();
        
        return redirect('/brand/manage-brand')->with('message', 'Brand info update successfully.');
    }
    
    public function deleteBrandInfo($id){
        $brandById = Brand::find($id);
        $brandById->delete();
        
        return redirect('/brand/manage-brand')->with('message', 'Brand info delete successfully.');
    }
    
    
    
    
}
