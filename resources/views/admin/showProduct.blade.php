<!DOCTYPE html>
<html lang="en">
  <head>
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

        <div class="main-panel">
            <div class="content-wrapper bg-transparent d-flex flex-column  mx-auto">
                <h1 class="my-3 fs-2 m-auto">All Product</h1>
                @if (session()->has('message'))
                <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    <strong>   {{session()->get('message')}}  </strong>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif
                <table class="table table-hover table-dark text-white  ">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $product )

                            <tr>
                                <th><img src="/storage/app/public/images/{{$product->image}}" class=""  alt=""></th>
                                <td>{{$product->title}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td><a href="{{url('updateView',$product->id)}}" class="btn btn-primary">Updata</a></td>
                                <td><a href="{{url('deleteProduct',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you Sure !')">Delete</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>


        <!-- partial -->
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script');
    </body>
</html>
