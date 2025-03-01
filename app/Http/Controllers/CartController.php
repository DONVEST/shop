<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller 
{
    public function addCart($id) { 

        //check if product already exist
        $data = DB::table('carts')->where('product_id',$id)->value('product_id');
        
            
        if ($data == $id){
            $message[] = ['Failed', 'Product already exist in your cart', 'error'] ;
            return redirect()->back()->withMessage($message);
        }
        
        
        $user = Auth::user();
        
        $user_id = $user->id;
        $product_id = $id;

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        
        $message[] = ['Cart Confirmed', 'You have added a Product to cart', 'success'] ;
        return redirect()->back()->withMessage($message);
    }
    
    public function removeCart($id) { 
         
        $cart = DB::table('carts')->where('id',$id);
        $cart->delete();
        
        $message[] = ['Cart Confirmed', 'You have removed a Product from your cart', 'success'] ;
        return redirect()->back()->withMessage($message);
    }

    public function showCart() { 
        if (!Auth::user() ) {
            $countCart = null;
            $countOrder = null;
        }else{
            $user = Auth::user();
            $user_id = $user->id;
           $countCart = Cart::where('user_id',$user_id)->count();
           $countOrder = Order::where('user_id',$user_id)->count();
            
           $carts = Cart::where('user_id',$user_id)->get();
        }
        
        return view('home.cart',compact('countCart','countOrder','carts'));
    }
}