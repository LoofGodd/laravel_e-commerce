<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    static public function get_cart_with($id){

        return Carts::join('products', 'carts.product_id', '=', 'products.id')->select('carts.id as cart_id', 'products.*', 'carts.count')->where("user_id",$id)->get();
    }

    public function increment_count(){
        $id = request()->input("cart_id");
        if(isset($id)){
            Carts::where('id', $id)->increment('count');
        }
        return back();
    }
    public function decrement_count(){
        $id = request()->input("cart_id");
        if(isset($id)){
            Carts::where('id', $id)->decrement('count');
        }
        return back();
    }
    public function delete(){
        $id = request()->input("cart_id");
        if(isset($id)){
            Carts::where('id', $id)->delete();
        }

        return back();
    }
    public function add(){
        $product_id = request()->input('product_id');
        $result = Carts::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
        if($result){
            Carts::where('id', $result->id)->increment('count');
        }else{
            Carts::create(['product_id' => $product_id,'user_id'=> auth()->user()->id]);
        }
        return redirect()->to('/cart');
    }
}
