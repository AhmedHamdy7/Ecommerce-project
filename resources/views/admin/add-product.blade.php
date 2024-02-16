<div class="main-panel">
    <div class="content-wrapper bg-transparent d-flex flex-column w-50 mx-auto">
        <h1 class="my-5 fs-2 m-auto">Add Product</h1>
        @if (session()->has('message'))
        <div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
            <strong>   {{session()->get('message')}}  </strong>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif


        @if ($errors->any())
    <div class="alert alert-danger ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{('uploadProduct')}}" method="post" enctype="multipart/form-data" >
            @csrf
            {{-- @method('POST') --}}
            <input type="text" name = "title" placeholder="Enter product title" value="{{old('title')}}"  class="form-control  text-dark w-100 my-3">
            <input type="number" name = "price" placeholder="Enter product price" value="{{old('price')}}"  class="form-control text-dark w-100 my-3">
            <input type="text" name = "desc" placeholder="Enter product description" value="{{old('desc')}}"  class="form-control text-dark w-100 my-3">
            <input type="number" name = "quantity" placeholder="Enter product quantity" value="{{old('quantity')}}"  class="form-control text-dark w-100 my-3">
            <input type="file" name = "file" placeholder="Enter product quantity" value="{{old('file')}}"   class="form-control  w-100 my-3 text-dark">

            <button class="btn btn-outline-info my-1 p-2 text-white w-100">submit</button>
        </form>
    </div>
</div>
