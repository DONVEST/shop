<x-layout.app :countCart='$countCart' :countOrder='$countOrder'>

    

    <div class="flex justify-center items-center container">
        <div class="col-md-10 ">
            <div class="box p-3">
              
                <div class="img-box">
                  <img src="{{asset("images/products/$product->image")}}" >
                </div>
                <div class="p-3">
                    <div class="detail-box">
                        <h6>Name: {{$product->title}}</h6><br>
                        <h6>Price:<span> ₦{{number_format($product->price,0)}}</span></h6><br>
                    </div>
                    <div class="new"><span>Category: {{$product->category}}</span></div><br>
                    <div class="new"><span>Quantity: {{$product->quantity}}</span></div><br>
                    <div class="new"><span>Uploaded: {{$product->created_at->diffForHumans()}}</span></div><br>
                    <div class="new"><span>Last Updated: {{$product->updated_at->diffForHumans()}}</span></div><br>
                    <div class="new"><span>Description: {{$product->description}}</span></div><br>
                </div>
                
            </div>
          </div>
    </div>

    <x-section.info/>

</x-layout.app>