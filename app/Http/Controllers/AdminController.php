<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard() {

        $users = User::all();
        $admin = User::where('isAdmin','1')->get();
        $products = Product::all();
        $orders = Order::all();
        $orders_pending = Order::where('status','pending')->get();
        $orders_processing = Order::where('status','processing')->get();
        $orders_delivered = Order::where('status','completed')->get();
        
        $total = 0;
        foreach ($orders as $order) {
            $amount = $order->product->price;
            $total = $total + $amount;
        }

        $p_a = ($admin->count() / $users->count()) * 100;
        $p_p = ($products->count() / $orders->count()) * 100;
        $p_o = ($orders->count() / $products->count()) * 100;
        $p_op = ($orders_pending->count() / $orders->count()) * 100;
        $p_opr = ($orders_processing->count() / $orders->count()) * 100;
        $p_od = ($orders_delivered->count() / $orders->count()) * 100;
        

        return view('admin.dashboard',compact('users','admin','products','orders','orders_pending','orders_processing','orders_delivered','total','p_a','p_p','p_op','p_opr','p_od','p_o'));
    }

    public function category() {
        return view('admin.category');
    }

    public function users() {
        
        $users = User::paginate(10);

        return view('admin.users',compact('users'));
    }

    public function userProfile($id) {

        $user = User::find($id);
        $user_id = $user->id;

        $user_orders = Order::where('user_id',$user_id)->paginate(10);
        
        return view('admin.section.user_profile',compact('user','user_orders'));
    }

    public function deleteUser($id) {

        $user = User::find($id);
        $user_id = $user->id;

        
        return back();
    }
}