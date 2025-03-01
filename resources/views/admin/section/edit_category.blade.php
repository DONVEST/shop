<x-admin.app>
    
    <div class="flex justify-center my-20">
        
        

        <form method="post" action="{{route('update_category',$data->id)}}">
            @csrf
    
            <div>
                <input type="text" name="category" id="" value="{{$data->category_name}}">
                <input type="submit"  class="btn btn-primary" value="Update Category" id="">
            </div>
        </form>
    </div>

</x-admin.app>