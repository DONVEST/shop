
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="box">
        
          <div class="img-box">
            <img src="{{asset("images/products/$product->image")}}">
          </div>
          <div class="detail-box">
            <h6>{{$product->title}}</h6>
            <h6>Price<span> ₦{{number_format($product->price,0)}}</span></h6>
          </div>
          <div class="new overflow-hidden"><span>{{$product->category}}</span></div>
          <div class="flex justify-between items-center p-2">
            <a href="{{route('home_product',$product->id)}}" class="btn btn-success">Details</a>
            <a href="{{route('add_cart',$product->id)}}" class="btn btn-primary">+<i class="fa fa-cart-plus" aria-hidden="true"></i></a>
          </div>
      </div>
    </div>