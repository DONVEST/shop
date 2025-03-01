<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller 
{
    
    public function home() {

        if (!Auth::user() ) {
            $countCart = null;
            $countOrder = null;
        }else{
            $user = Auth::user();
            $user_id = $user->id;
           $countCart = Cart::where('user_id',$user_id)->count();
           $countOrder = Order::where('user_id',$user_id)->count();
        }        
        
        $products = Product::all();
        
        return view('home.index',compact('products','countCart','countOrder'));
    }
    
    public function product($id) {
        if (!Auth::user() ) {
            $countCart = null;
            $countOrder = null;
        }else{
            $user = Auth::user();
            $user_id = $user->id;
           $countCart = Cart::where('user_id',$user_id)->count(); 
           $countOrder = Order::where('user_id',$user_id)->count();
        }
        
        $product = Product::find($id);
        
        return view('home.product',compact('product','countCart','countOrder'));
    }
    
    
    
    
    
    
    
    
}