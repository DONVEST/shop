<x-admin.app>

    

    @if (count($products) != 0)
    <div class="col-lg-6 mx-auto my-5" onload="notify()">
        <div class="block">
          <div class="title"><strong>All Products</strong></div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>View</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$product->title}}</td>
                        <td>{!!Str::limit($product->description,50)!!}</td>
                        <td>{{$product->category}}</td>
                        <td>₦{{number_format($product->price,0)}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><img src="{{asset("images/products/$product->image")}}" height="120" width="120"></td>
                        <td><a href="{{route('edit_product',$product->id)}}" class="btn btn-success" onclick="notify()">Edit</a></td>
                        <td><a href="{{route('delete_product',$product->id)}}" class="btn btn-danger" onclick="deletion(event)">Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    @else
    <h1 class="text-center my-10 ">No product available</h1>
    @endif

    <div class="text-center mx-auto p-10">
        {{$products->onEachSide(3)->links()}}
    </div>

    @if ($result)
      <script>
        window.onload = function notify() {
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "info",
            title: 'Search Complete'
          });
        }
      </script>
    @endif

    
    
</x-admin.app>