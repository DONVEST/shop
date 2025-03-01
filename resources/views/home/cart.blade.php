<x-layout.app :countCart='$countCart' :countOrder='$countOrder'>

    

<section class="shadow justify-center items-center mx-auto p-5">
    <div class="container-fluid">
        <div class="row">
            <!-- Basic Form-->
        <div class="col-lg-6">
            <div class="block">
            <div class="title"><strong class="d-block">Order Form</strong><span class="d-block">Lorem ipsum dolor sit amet consectetur.</span></div>
            <div class="block-body">
                <form method="POST" action="{{route('make_order')}}">
                    @csrf

                <div class="form-group">
                    <label class="form-control-label">Receiver Name</label>
                    <input type="text" placeholder="Full Name" name="name" value="{{Auth::user()->name}}" class="form-control">
                </div>
                <div class="form-group">       
                    <label class="form-control-label">Receiver Address</label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control">{{Auth::user()->address}}</textarea>
                </div>
                <div class="form-group">       
                    <label class="form-control-label">Receiver Phone</label>
                    <input type="text" placeholder="phone" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                </div>
                <div class="form-group">       
                    <input type="submit" value="Cash on Delivery" class="btn btn-primary">
                </div>
                  </form>
                
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<section class="shop_section layout_padding">
     
<div class="container">
    <?php $total=0 ?>
    <div class="row">
        @foreach ($carts as $cart)
            
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <div class="img-box">
                <img src="{{asset('images/products/'.$cart->product->image.'')}}">
                </div>
                <div class="detail-box">
                <h6>{{$cart->product->title}}</h6>
                <h6>Price<span> ₦{{number_format($cart->product->price,0)}}</span></h6>
                </div>
                <div class="new overflow-hidden"><span>{{$cart->product->category}}</span></div>
                <div class="flex justify-between items-center p-2">
                <a href="{{route('home_product',$cart->product->id)}}" class="btn btn-success">Details</a>
                <a href="{{route('remove_cart',$cart->id)}}" class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <?php $total = $total + $cart->product->price?>
        @endforeach
    </div>
</div><br>
<div class="flex-col justify-center items-center p-5">
    <h1>Total value of cart is ₦ {{number_format($total,0)}}</h1>
    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
      <div class="row" style="margin-bottom:40px;">
          <div class="col-md-8 col-md-offset-2">
              <p>
                  <div>
                      Total Amount to pay:
                      ₦ {{number_format($total,0)}}
                  </div>
              </p>
              <input type="hidden" name="email" value="{{Auth::user()->email}}"> {{-- required --}}
              <input type="hidden" name="orderID" value="345">
              <input type="hidden" name="amount" value="{{$total}}00"> {{-- required in kobo --}}
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="currency" value="NGN">
              <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
              
  
              <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
  
              <p>
                  <button class="btn btn-info btn-lg btn-block" type="submit" value="Pay Now!">
                      <i class="fa fa-plus-circle fa-lg"></i> Pay Now with Paystack!
                  </button>
              </p>
          </div>
      </div>
    </form>
</div>
</section>

<script src="https://js.paystack.co/v1/inline.js"></script>
  
</x-layout.app>