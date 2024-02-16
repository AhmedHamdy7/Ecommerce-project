<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    @include('admin.css');
  </head>

  <body>



    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar');

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar');

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper bg-transparent d-flex flex-column w-50 mx-auto">
                <h1 class="my-5 fs-2 m-auto">Updata Product</h1>
                @if (session()->has('message'))
                <div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                    <strong>   {{session()->get('message')}}  </strong>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="{{url('UpdateProduct',$data->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    {{-- @method('POST') --}}
                    <input type="text" name = "title" value="{{$data->title}}"  class="form-control  text-dark w-100 my-3">
                    <input type="number" name = "price" value="{{$data->price}}"  class="form-control text-dark w-100 my-3">
                    <input type="text" name = "desc"  value="{{$data->description}}"  class="form-control text-dark w-100 my-3">
                    <input type="number" name = "quantity" value="{{$data->quantity}}"  class="form-control text-dark w-100 my-3">
                    <div class="mb-2">
                        <label for="">Old Image</label>
                        <img src="/storage/app/public/images/{{$data->image}}" class=" w-25 h-25"  alt="">
                    </div>
                    <label for="">Change Image<input type="file" name = "file" placeholder="Enter product quantity"  class="form-control  w-100 my-3 text-dark"></label>

                    <button class="btn btn-outline-info my-1 p-2 text-white w-100">submit</button>
                </form>
            </div>
        </div>
                <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script');
    </body>
</html>
