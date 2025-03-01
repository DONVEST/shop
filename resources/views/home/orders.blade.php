
<x-layout.app :countCart='$countCart' :countOrder='$countOrder'>

  <!-- shop section -->

  <x-section.shop >
    @if (count($orders) < 1)
    <h1 class="text-center my-10 ">No Category available</h1>
    @else
    @foreach ($orders as $order)
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          
            <div class="img-box">
              <img src="{{asset('images/products/'.$order->product->image.'')}}">
            </div>
            <div class="detail-box">
              <h6>{{$order->product->title}}</h6>
              <h6>Price<span> ₦{{number_format($order->product->price,0)}}</span></h6>
            </div>
            <div class="new overflow-hidden"><span>{{$order->product->category}}</span></div>
            <div class="flex justify-between items-center p-2">
                @if ($order->status === 'pending')
                <span class="pending">{{$order->status}}</span>
                @elseif ($order->status === 'processing')
                <span class="processing">{{$order->status}}</span>
                @elseif ($order->status === 'completed')
                <span class="completed">Delivered</span>
                @endif
            </div>
        </div>
      </div>
    @endforeach
    @endif
  </x-section.shop>

  <!-- end shop section -->


   

  <!-- info section -->
  <x-section.info/>
  <!-- end info section -->



  

</x-layout.app>