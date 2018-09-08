<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PricingPlan;
use App\PricingPlanDetail;
use Toastr;
use Image;
use Illuminate\Support\Facades\Input;

class PricingPlanController extends Controller
{
    public function index(){
        $pricingPlan  =  PricingPlan::all();
        $PricingPlanDetail = PricingPlanDetail::all();
       
        return view('admin.pricing-plan.index',compact('pricingPlan'));
    }
    public function create(){
        return view('admin.pricing-plan.create-plan');
    }
    public function store(Request $request){
        $inputs  = Input::except(['_token', 'image','name','type','link']);

        $pricingPlan  = new PricingPlan();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $location = 'assets/frontend/img/pricing-card-image/';
            $imgUrl = $location.$imageName;
            Image::make($image)->save($imgUrl);
            $pricingPlan->image = $imgUrl;
        }
        $pricingPlan->name = $request->name;
        $pricingPlan->type = $request->type;
        $pricingPlan->link = $request->link;
        $pricingPlan->save();
        if(count($inputs) > 0){
            for($i = 0; $i < count($inputs['title']); $i++){
            $detail =  new PricingPlanDetail();
            $detail->plan_id =  $pricingPlan->id;
            $detail->title =  $request->title[$i];
            $detail->icon =  $request->icon[$i];
            $detail->save();
            } 
        }

        Toastr::success('Informaion Added Successfully ...');
        return back();
    }
    public function edit($id){
        $pricingPlan  =  PricingPlan::find($id);
        $pricingPlanDetail =PricingPlanDetail::where('plan_id',$id)->get();

        return view('admin.pricing-plan.edit-plan',compact('pricingPlan','pricingPlanDetail'));
    }

    public function update(Request $request){  
    
        $inputs  = Input::except(['_token', 'image','name','type','link']);
        $pricingPlan  =  PricingPlan::find($request->plan_id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $location = 'assets/frontend/img/pricing-card-image/';
            $imgUrl = $location.$imageName;
            Image::make($image)->save($imgUrl);
            $pricingPlan->image = $imgUrl;
        }
        $pricingPlan->name = $request->name;
        $pricingPlan->type = $request->type;
        $pricingPlan->link = $request->link;
        $pricingPlan->save();

        $cInput = $inputs['title'];

        if(count($inputs) > 0){
              $detail =   PricingPlanDetail::where('plan_id',$request->plan_id)->get();
            $detailCount = count($detail);
            foreach($cInput as $i => $j){
                if($i < $detailCount){
                   $detail[$i]->title =  $request->title[$i];
                   $detail[$i]->icon =  $request->icon[$i];
                   $detail[$i]->save();
                }
                elseif($i >= $detailCount){ 
                    $new = new PricingPlanDetail();
                    $new->plan_id =  $request->plan_id;
                    $new->title =  $request->title[$i];
                    $new->icon =  $request->icon[$i];
                    $new->save();
                    }
            }
        }


        // if(count($inputs) > 0){
        //     $detail =   PricingPlanDetail::where('plan_id',$request->plan_id)->get();
        //     $detailCount = count($detail);
        //     foreach($detail as $k => $v){
        //     $v->title =  $request->title[$k];
        //     $v->icon =  $request->icon[$k];
        //     $v->save();
        //     } 
        //     foreach($cInput as $i => $j){
        //         if($i >= $detailCount){ 
        //             $new = new PricingPlanDetail();
        //            $new->plan_id =  $request->plan_id;
        //            $new->title =  $request->title[$i];
        //            $new->icon =  $request->icon[$i];
        //            $new->save();
        //        }
        //     } 
        // } 
    
        Toastr::success('Informaion Updated Successfully ...');
        return back();
    }
   
    public function deleteItem($id){
        // dd($id);
        $PricingPlanDetail = PricingPlanDetail::findOrFail($id);
        // $planDetail = $request->plan_id;
        $PricingPlanDetail->delete();
        Toastr::success('Informaion Deleted Successfully ...');
        return back();
    }
   
}
