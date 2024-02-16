<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>


        </div>

        <form action="{{url('search')}}" method="GET" class="form-inline mb-2">
            @csrf
              <h1 class="mx-3">Search this site</h1>
              <div class="m-auto">
                <input type="search" name="search" class="form-control" placeholder="Search . . ."><i class="fa-solid fa-magnifying-glass"></i>
                <input type="submit" value="search" class="btn btn-success">
            </div>
        </form>
        </div>

          @foreach ($data as  $product )
          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
              <a href="#"><h4> {{$product->title}} </h4></a>
              <h6>{{$product->price}} EGP</h6>
              <p>{{$product->description}}</p>
              <ul class="stars">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
              </ul>
                <span>Reviews (24)</span>

            </div>
            <form action="{{url('addcart',$product->id)}}" method="POST" class=" form-inline">
                @csrf
                <input type="number" name="quantity" value="1" min="1" class="form-control m-4" style="width: 180px">
                <input type="submit" name="addcart" class="btn btn-primary" value = "Add Cart" id="">
            </form>
            </div>
          </div>

        @endforeach

        @if (method_exists($data,'links'))

        <div class="d-flex justify-content-center mx-auto">

            {!! $data->links() !!}
        </div>

        @endif

      </div>
    </div>
  </div>
