@extends("layouts.layout")

@section("content")
    <!-- Page Content -->
    <div class="container mt-4 min-vh-100 mt-5">

    </br>
    </br>
    </br>
    </br>
        <hr />

        <div class="row">
            <div class="col-lg-3 mt-3">
                <form action="{{route('products')}}" method="GET">
                    <input type="text" class="form-control mb-3" name="keyword" placeholder="Search..."/>
                    <select class="form-control mb-3" name="sort">
                        <option value="name-asc">A - Z</option>
                        <option value="name-desc">A - Z</option>
                        <option value="priceValue-asc">Price ascending</option>
                        <option value="priceValue-desc">Price descending</option>
                    </select>
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <input type="checkbox" name="categories[]" id="category{{$category->id}}" value="{{$category->id}}" /> {{$category->name}}
                            </li>
                        @endforeach
                    </ul>

                    <ul class="list-group mt-3">
                        @foreach($brands as $brand)
                            <li class="list-group-item">
                                <input type="checkbox" name="brands[]" id="brand{{$brand->id}}" value="{{$brand->id}}" /> {{$brand->name}}
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="btn btn-danger mt-2">Search</button>
                </form>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
            @php
            //dd($products)
            @endphp
                <div class="row">
                    @if(count($products) == 0)
                        <p class="alert alert-danger text-center">There is no products that fit criteria</p>
                    @endif
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4 ">
                        <div class="card  shadow">
                            <a href="{{route('products.show', ['product'=>$product->id])}}"><img class="card-img-top" src="{{asset('assets/images/'.$product->image)}}" alt="{{$product->name}}"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{$product->name}}
                                </h4>
                                <p class="card-text">{{$product->description}}</p>
                                <p class="card-text text-end fw-bolder">{{$product->brands->name}}</p>
                                <p class="card-text text-end fst-italic fw-light">
                                    @foreach($product->categories as $cat)
                                        {{$cat->name}}
                                    @endforeach
                                </p>
                                <h5 class="text-end">$24.99</h5>
                                <p class="card text"> Available in
                                    @foreach($product->volumes as $vol)
                                        {{$vol->volumeInMillilitres}}
                                    @endforeach
                                ml</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
