<x-admin.app>
<br>
    <div class=" grid ">
          <div class="container-fluid ">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-6">
                <div class="block">
                    <div class="title mx-auto">
                        <strong class="d-block">Update Product</strong>
                        <span class="d-block">This product was uploaded {{$product->created_at->diffForHumans()}}</span>
                        <span class="d-block">Product was last Updated {{$product->updated_at->diffForHumans()}}</span>
                    </div>
                  <div class="block-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('update_product',$product->id)}}" onsubmit="notify()">
                      @csrf

                      <div class="form-group">
                        <label class="form-control-label">Title</label>
                        <input type="text" placeholder="title " name="title" value="{{$product->title}}" class="form-control">
                      </div>
                      @error('title')
                        <span style="color: red">{{$message}}</span>
                      @enderror

                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea name="description" class="form-control-label" cols="30" rows="10">{{$product->description}}</textarea>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-control-label">Price</label>
                        <input type="text" placeholder="price " name="price" value="{{$product->price}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Category</label>
                        <select name="category" class="form-control">
                            <option value="{{$product->category}}" selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>     
                         @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Quantity</label>
                        <input type="text" placeholder="quantity " name="quantity" value="{{$product->quantity}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <img class="rounded-circle mx-10" src="{{asset("images/products/$product->image")}}" alt=""
                            style="width: 80px; height: 80px;"><br>
                        <label class="form-control-label">Image</label>
                        <input type="file" name="image"/>
                      </div>
                      <div class="form-group">       
                        <input type="submit" value="Update Product" class="btn btn-success" >
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
</div>  
</x-admin.app>