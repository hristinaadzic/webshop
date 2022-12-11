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
                    <input type="text" class="form-control mb-3" name="keyword" placeholder="Search..." value="{{request()->keyword ?? ''}}"/>
                    <select class="form-control mb-3" name="sort">
                        <option value="asc" @if(request()->sort && request()->sort == 'asc') selected @endif>A - Z</option>
                        <option value="desc" @if(request()->sort && request()->sort == 'desc') selected @endif>Z - A</option>
                    </select>
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <li class="list-group-item">
                                <input type="checkbox" name="categories[]" id="category{{$category->id}}" value="{{$category->id}}" @if(request()->categories && in_array($category->id, request()->categories)) checked @endif/> {{$category->name}}
                            </li>
                        @endforeach
                    </ul>

                    <ul class="list-group mt-3">
                        @foreach($brands as $brand)
                            <li class="list-group-item">
                                <input type="checkbox" name="brands[]" id="brand{{$brand->id}}" value="{{$brand->id}}" @if(request()->brands && in_array($brand->id, request()->brands)) checked @endif/> {{$brand->name}}
                            </li>
                        @endforeach
                    </ul>
                    <button type="submit" class="btn btn-danger mt-2">Search</button>
                </form>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
            @php
           // dd($products)
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
                                <p class="card text"> Available in
                                    @foreach($product->volumes as $vol)
                                        {{$vol->volumeInMillilitres}}
                                    @endforeach
                                ml</p>
                                <p class="card text"> Prices for given volumes
                                    @foreach($product->prices as $p)
                                        {{$p->priceValue}} $
                                    @endforeach
                                    </p>

                                <a type="button" class="btn-sm btn-danger mt-2" href="{{route('products.show',['product'=>$product->id])}}">Go Shop</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            {{$products->withQueryString()->links('pagination::bootstrap-4')}}
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection
