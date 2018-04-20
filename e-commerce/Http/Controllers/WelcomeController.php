<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    
    public function index() {
        $products = Product::where('publication_status', 1)->orderBy('id', 'desc')->take(8)->get();
        return view('front.home.home-content', ['products'=>$products]);
    }
    
    public function productCategory($id){
        $products = Product::where('category_id', $id)->get();
        return view('front.category.category-content', ['products'=>$products]);
    }
    
    public function productDetails($id){
//        $product = Product::find($id);
        $product = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->join('brands', 'products.brand_id', '=', 'brands.id')
                        ->select('products.*', 'categories.category_name', 'brands.brand_name')
                        ->where('products.id', $id)
                        ->first();
        $subImages = SubImage::where('product_id', $id)->get();

        $latestProducts = Product::where('publication_status', 1)->orderBy('id', 'desc')->take(5)->get();

        $categoryProducts = Product::where('category_id', $product->category_id)->get();

        return view('front.product.product-details-content', [
                        'product'=>$product,
                        'subImages'=>$subImages,
                        'latestProducts' => $latestProducts,
                        'categoryProducts' => $categoryProducts
                    ]);
    }
}
