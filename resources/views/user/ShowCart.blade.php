<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class=" navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              @if (Route::has('login'))
                  @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('ShowCart') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cart[{{$count}}]</a>
                </li>
                  <li>
                    {{-- <x-app-layout>
                    </x-app-layout> --}}
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                </li>
                @endif
                @endauth
                @endif

            </ul>
        </div>
        {{-- <x-app-layout>
        </x-app-layout> --}}
        </div>
      </nav>
      @if (session()->has('message'))
                <div class="alert alert-success text-center alert-dismissible fade show w-50 m-auto " role="alert">
                    <strong>   {{session()->get('message')}}  </strong>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

        @endif




    </section>

    <div class="container w-100 p-5">

    <section id="cart" class="section-p1">
        <table width="100%" class="table table-hover table-dark">
            <thead>
                <tr>
                    <td>Product_Title</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Action</td>
                    {{-- <td>Edit</td>
                    <td>Remove</td> --}}
                    </tr>
                    {{$sum = 0;}}
            </thead>
            <form action="{{url('order')}}" method="POST">
                @csrf
                    <tbody>

                    @foreach ( $cart as $carts )


                        <tr>
                            <td> <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden>
                                {{$carts->product_title}}
                            </td>
                            <td> <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden>
                                {{$carts->quantity}}
                            </td>
                            <td> <input type="text" name="price[]" value="{{$carts->price}}" hidden>
                                {{$carts->price}}
                            </td>

                            <td>{{$carts->price * $carts->quantity}}</td>
                            <td><a class="btn btn-danger" href="{{url('delete',$carts->id)}}">Remove</a></td>
                            <td></td>
                            {{$sum +=$carts->price * $carts->quantity}};

                        </tr>
                        @endforeach
                        <td>TOTAL : {{$sum}} </td>
                    </tbody>
                    <td><button type="submit" name="" class="btn btn-success w-100">Confirm Order</button></td>
            </form> 
        </table>
    </section>

    </div>



    </header>


    {{-- <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer> --}}



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
