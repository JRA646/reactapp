<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function store(Request $request, Category $category){
        $category->name = Str::of($request->name)->title();
        $category->description = $request->description;

        if($category->save()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }

    public function patch(Request $request){
        $category = Category::where('id',$request->id)->first();

        $category->name = Str::of($request->name)->title();
        $category->description = $request->description;

        if($category->save()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }

    public function destroy($id){
        $category = Category::where('id',$id)->first();
        
        if($category->delete()){
            return [
                'status' => 200,
                'response' => 's'
            ];
        }
    }
}