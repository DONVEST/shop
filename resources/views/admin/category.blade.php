<x-admin.app>
    <div class="flex justify-center my-20">
        
        <form method="post" action="{{ route('category') }}" onsubmit="notify()">
            @csrf
    
            <div>
                <input type="text" name="category" id="">
                <input type="submit"  class="btn btn-primary" value="Add Category" id="">
            </div>
        </form>
    </div>

    @if (count($data) != 0)
    <div class="col-lg-6 mx-auto">
        <div class="block">
          <div class="title"><strong>All Categories</strong></div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}}</td>
                        <td><a href="{{route('edit_category',$category->id)}}" class="btn btn-success">View</a></td>
                        <td><a href="{{route('delete_category',$category->id)}}" class="btn btn-danger" onclick="deletion(event)">Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    @else
    <h1 class="text-center my-10 ">No Category available</h1>
    @endif
    <div class="px-4">
        {{$data->links()}}
    </div>
    

</x-admin.app>