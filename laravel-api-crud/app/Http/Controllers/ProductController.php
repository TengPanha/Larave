<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;


class ProductController extends Controller
{
    public function getAllProduct(){
       $products=Product::all();
        return response(['data'=>$products]);
    }
    public function  getOneProduct($id){
        $product=Product::find($id);
        return response(['data'=>$product]);
    }

    public function saveProduct(Request $request){
        $addProduct=Product::create($request->all());
        return response(['data'=>$addProduct]);
    }

    public function deleteProduct($id){
        $product=Product::find($id);
        if($product){
            $product->delete();
            return response(['message'=>'delete SuccessFully']);
        }
        return response(['message'=>'delete fial']);
    }

    public function updateProduct(Request $request,$id){
        $product=Product::find($id);
        if($product){
            $product->update($request->all());
            return response(['data'=>$product]);
        }
        return response(['message'=>'update SuccessFully']);
    }
}
