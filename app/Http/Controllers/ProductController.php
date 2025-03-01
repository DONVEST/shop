<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        
        return view('admin.section.add_product',['categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();
            
        
        $products->title = $request->title;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->category = $request->category;
        $products->quantity = $request->quantity;

        if($products->title === null ||  $products->description === null || $products->price === null || $products->category === null || $products->quantity === null){
            $message[] = ['Upload Failed', 'All field must be filled', 'error'] ; 
            return back()->withMessage($message); 
        }
        
        //to store image
        $image = $request->image;
        if ($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images/products',$image_name);
            $products->image = $image_name;
        }
        
        $products->save();
        
        $message[] = ['Upload Successful', 'You have Added a new Product', 'success'] ;
        return redirect()->route('products')->withMessage($message);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $products = Product::paginate(3);
        $count = 1;
        $result = false;

        return view('admin.products',['products' => $products, 'count' => $count, 'result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        return view('admin.section.product',['product' => $product,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->updated_at = date('Y-m-d H:i:s');

        if($product->title === null ||  $product->description === null || $product->price === null || $product->category === null || $product->quantity === null){
            $message[] = ['Upload Failed', 'All field must be filled', 'error'] ; 
            return back()->withMessage($message); 
        }
        
        //to store image
        $image = $request->image;
        if ($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images/products',$image_name);
            $product->image = $image_name;
        }
        
        $product->save();
        
        $message[] = ['Update Successful', "You have updated $product->title in Products", 'success'] ;
        return redirect()->route('products')->withMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $product = Product::find($id);

        //if data set contains image sotred in public folder
        $image_path = public_path('images/products'.$product->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        
        $product->delete();

        $message[] = ['Deletion Successful', 'You have removed a Product', 'success'] ;
        return back()->withMessage($message);
    }

    public function search(Request $request){
        
        $search = $request->search;
        $products = Product::where('title','LIKE',"%$search%")->orWhere('category','LIKE',"%$search%")->paginate(3);
        $count = 1;
        $result = true;

        $message[] = ['Search Complete', '', 'info'] ;
        return view('admin.products',compact('products','count','result'))->with('action',$message);
        
    }
}