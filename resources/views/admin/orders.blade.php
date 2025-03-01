<x-admin.app>

    @if (count($orders) != 0)
    <?php $id = 1 ?>
    <div class="col-lg mx-auto">
        <div class="block">
          <div class="title"><strong>All Orders</strong></div>
          <div class="table-responsive"> 
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Customer Name</th>
                  <th>Address</th>
                  <th>Product title</th>
                  <th>Phone</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Processes</th>
                  <th>PDF</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$id++}}</th>
                        <td>{{$order->user->name}}</td>
                        <td>{!!Str::limit($order->address,30)!!}</td>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->phone}}</td>
                        <td>₦{{number_format($order->product->price)}}</td>
                        <td>
                          @if ($order->status === 'pending')
                          <span class="pending">{{$order->status}}</span>
                          @elseif ($order->status === 'processing')
                          <span class="processing">{{$order->status}}</span>
                          @elseif ($order->status === 'completed')
                          <span class="completed">{{$order->status}}</span>
                          @endif
                        </td>
                        <td><img src="{{asset('images/products/'.$order->product->image.'')}}" alt=""></td>
                        <td>
                          @if ($order->status === 'pending')
                          <a href="{{route('process_order',$order->id)}}" class="btn btn-primary">Process</a>
                          @elseif ($order->status === 'processing') 
                          <a href="{{route('process_order',$order->id)}}" class="btn btn-success">Delivered</a>
                          @else
                          <a href="{{route('process_order',$order->id)}}" class="btn processing">Completed</a>
                          @endif
                        </td>
                        <td><a href="{{route('print_order',$order->id)}}" class="btn btn-secondary" onclick="Confirm(event)">Print</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    @else
    <h1 class="text-center my-10 ">No Order has been made</h1>
    @endif
    <div class="px-4">
        {{$orders->onEachSide(1)->links()}}
    </div>

</x-admin.app>