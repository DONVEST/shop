<x-layout.app :countCart='$countCart' :countOrder='$countOrder'>
  
    
    <!-- slider section -->
    <x-section.slider/>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <x-section.shop >
    @foreach ($products as $product)
      <x-section.itemCard :product='$product'/>
    @endforeach
  </x-section.shop>

  <!-- end shop section -->


  <!-- contact section -->

  <x-section.contact/>

  <!-- end contact section -->

   

  <!-- info section -->
  <x-section.info/>
  <!-- end info section -->



  

</x-layout.app>

