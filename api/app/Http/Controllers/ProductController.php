<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $request, Product $product){
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price = $request->price;

        if($product->save()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }

    public function patch(Request $request){
        $product = Product::where('id',$request->id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price = $request->price;

        if($product->save()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        
        if($product->delete()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }
}
