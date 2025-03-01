<x-admin.app>
    <div class=" grid ">
        <div class="container-fluid ">
          <div class="row">
            <!-- Basic Form-->
            <div class="col-lg-6 my-5 mx-auto">
              <div class="block">
                <div class="title"><strong class="d-block">Basic Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
                <div class="block-body flex">
                  <form method="POST"  action="{{route('admin_user_update',$user->id)}}" onsubmit="notify()">
                    @csrf

                    <div class="form-group">
                      <label class="form-control-label">Name</label>
                      <input type="text" placeholder="title " name="name" value="{{$user->name}}" class="form-control">
                    </div>
                    @error('name')
                      <span style="color: red">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group">
                      <label class="form-control-label">Email</label>
                      <input type="text" placeholder="email " name="email" value="{{$user->email}}" class="form-control">
                    </div>
                    @error('email')
                      <span style="color: red">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group">
                      <label class="form-control-label">Password</label>
                      <input type="text" placeholder="password " name="password"  class="form-control">
                    </div>
                    @error('password')
                      <span style="color: red">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group">
                      <label class="form-control-label">Confirm Password</label>
                      <input type="text" placeholder="password " name="password" class="form-control">
                    </div>
                    @error('password')
                      <span style="color: red">{{$message}}</span>
                    @enderror
                    
                    <div class="form-group justify-between">       
                      <input type="submit" value="Update User" class="btn btn-success" >
                      @if ($user->email_verified_at == null)
                      <a href="{{route('admin_user_verify',$user->id)}}" class="btn btn-info">Verify User</a>
                      @endif
                      <a href="{{route('admin_user_delete',$user->id)}}" class="btn btn-danger">Delete User</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
  
</div>
</x-admin.app>