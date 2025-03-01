<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        
        $orders = Order::paginate(10);
        
        return view('admin.orders',compact('orders'));

    }
    
    public function create(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id',$user_id)->get();

        if(count($carts) === 0){
            $message[] = ['Order failed', 'Please add an item to cart', 'info'] ;
            return back()->withMessage($message);   
        }
        
        foreach($carts as $cart){
            $order = new Order;

            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $cart->product->id;
            
            $order->save();
            
            
        }//add to cart

        $old_carts = Cart::where('user_id',$user_id)->get();
        foreach($old_carts as $old_cart){
            $data = Cart::find($old_cart->id);
            $data->delete();
        }//reove old cart
        
        $message[] = ['Order Successful', 'You have created a new order', 'success'] ;
        return back()->withMessage($message);
        
    }

    public function process($id){

        if (!$id) {
            $message[] = ['Invalid Request', 'No request was made', 'info'] ;
            return back()->withMessage($message);
        }
        
        $order = Order::find($id);

        if (!$order) {
            $message[] = ['Invalid Request', 'This order does not exist', 'info'] ;
            return back()->withMessage($message);
        }

        if ($order->status === 'pending') {
            $order->status = 'processing';
            $order->save();

            $message[] = ['Request Successful', 'Order '.$order->id.' has been Processed', 'success'] ;
            return back()->withMessage($message);
        }
        if ($order->status === 'processing') {
            $order->status = 'completed';
            $order->save();

            $message[] = ['Request Successful', 'Order '.$order->id.' has been delivered', 'success'] ;
            return back()->withMessage($message);
        }
        if ($order->status === 'completed') {
            $order->status = 'pending';
            $order->save();

            $message[] = ['Request Successful', 'Order '.$order->id.' is now pending', 'success'] ;
            return back()->withMessage($message);
        }
        
    }

    //print orderas pdf
    public function print($id){
        $order = Order::find($id);
        $order_id = $order->id;
        $path = $order->product->image;
 
        $pdf = Pdf::loadView('pdf.invoice',compact('order','path'));
        return $pdf->download('Shp_'.$order_id.'_Invoice.pdf');
        
    }
    public function test($id){
        $order = Order::find($id);
        $path = $order->product->image;
 
        return view('pdf.invoice',compact('order','path'));   
    }

    public function orders() {
        if (!Auth::user() ) {
            $countCart = null;
            $countOrder = null;
        }else{
            $user = Auth::user();
            $user_id = $user->id;
           $countCart = Cart::where('user_id',$user_id)->count(); 
           $countOrder = Order::where('user_id',$user_id)->count();
        }
        
        $orders = Order::where('user_id',Auth::user()->id)->get();
        
        return view('home.orders',compact('orders','countCart','countOrder'));
    }
    
}