<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function showProductForm() {
        $publishedCategories = Category::where('publication_status', 1)->get();
        $publishedBrands = Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product', [
            'publishedCategories'=>$publishedCategories,
            'publishedBrands'=>$publishedBrands
        ]);
    }

    public function saveProductInfo(Request $request) {

        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory= 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->save($imageUrl);


        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
        $productId = $product->id;

        $subImages = $request->file('sub_image');
        foreach ($subImages as $subImage) {
            $subImageName = $subImage->getClientOriginalName();
            $subImageDirectory= 'sub-images/';
            $subImageUrl = $subImageDirectory.$subImageName;
            Image::make($subImage)->save($subImageUrl);

            $subImage = new SubImage();
            $subImage->product_id = $productId;
            $subImage->sub_image = $subImageUrl;
            $subImage->save();
        }

        return redirect('/product/add-product')->with('message', 'Product info create successfully');


    }

    public function manageProductInfo() {
        return view('admin.product.manage-product');
    }


}
