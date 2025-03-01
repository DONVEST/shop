<x-admin.app>

    <div class=" grid ">
          <div class="container-fluid ">
            <div class="row">
              <!-- Basic Form-->
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Basic Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                  <div class="block-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('new_product')}}" onsubmit="notify()">
                      @csrf

                      <div class="form-group">
                        <label class="form-control-label">Title</label>
                        <input type="text" placeholder="title " name="title" value="{{old('title')}}" class="form-control">
                      </div>
                      @error('title')
                        <span style="color: red">{{$message}}</span>
                      @enderror

                      <div class="form-group">
                        <label class="form-control-label">Description</label>
                        <textarea name="description" class="form-control-label" cols="30" rows="10">{{old('description')}}</textarea>
                      </div>
                      
                      <div class="form-group">
                        <label class="form-control-label">Price</label>
                        <input type="text" placeholder="price " name="price" value="{{old('price')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Category</label>
                        <select name="category" class="form-control">
                            <option value="" selected disabled>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>     
                         @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Quantity</label>
                        <input type="text" placeholder="quantity " name="quantity" value="{{old('quantity')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Image</label>
                        <input type="file" name="image"/>
                      </div>
                      <div class="form-group">       
                        <input type="submit" value="Add New" class="btn btn-success" >
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    
</div>  
<script>
  function notify() {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  Toast.fire({
    icon: "info",
    title: 'Processing info'
  });
}
</script>
</x-admin.app>