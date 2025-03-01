<x-admin.app>
    
    @if (count($users) > 1)
    <div class="col-lg my-5 mx-auto">
        <div class="block">
          <div class="title"><strong>All Categories</strong></div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover text-center">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Date Registered</th>
                  <th>Verified</th>
                  <th>Edit</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                            @if ($user->email_verified_at != null)
                                <i class="fa fa-check" style="color: green" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-times-circle" style="color: red" aria-hidden="true"></i>
                            @endif
                        </td>
                        <td><a href="{{route('admin_user',$user->id)}}" class="btn btn-success" onclick="notify()">View</a></td>
                        <td><a href="{{route('admin_user_delete',$user->id)}}" class="btn btn-danger" onclick="deletion(event)">Delete</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    @else
    <h1 class="text-center my-10 ">No Users registered yet</h1>
    @endif
    <div class="px-4">
        {{$users->links()}}
    </div>
    

</x-admin.app>