<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;

use Alert;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category');
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
        $category = new Category;
        
        // $data = $request->category;
        $data = $request->category;

        if($data === null){
            
            $message[] = ['Upload Failed', 'Category field can not be empty', 'error'] ; 
            return back()->withMessage($message);  
        }

        $category->category_name = $data ;
        $execute = $category->save();

        
        $message[] = ['Upload Successful', 'You have Added a new Category', 'success'] ;
        return back()->withMessage($message);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data = Category::paginate(10);

        return view('admin.category',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.section.edit_category',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = Category::find($id);
        $update = $request->category;

        if($update === null){
            
            $message[] = ['Update Failed', 'Category field can not be empty', 'error'] ; 
            return back()->withMessage($message);  
        }

        $data->category_name = $update ;
        $data->update();
        
        $message[] = ['Update Successful', 'You have successfully updated Category', 'success'] ;
        return redirect()->route('category')->withMessage($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $data = Category::find($id);
        $data->delete();
        
        $message[] = ['Deletion Successful', 'You have removed a Category', 'success'] ;
        return back()->withMessage($message);
    }
}