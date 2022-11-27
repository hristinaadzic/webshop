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

            <div class="col-lg-3">

                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" name="options" id="opt1" /> Option 1
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="options" id="opt2" /> Option 2
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" name="options" id="opt3" /> Option 3
                    </li>
                </ul>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top" src="{{asset('assets/images'.$product->image)}}" alt="{{$product->name}}"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="#">{{$product->name}}</a>
                                </h4>
                                <h5>$24.99</h5>
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
