@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel mt-5">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <div class="col-md-6 mx-auto">
                                <form action="{{route('prices.store')}}" method="POST">
                                    @csrf
                                    @php
                                    //dd($product);
                                        $volumes = [];
                                        foreach ($products as $p){
                                            foreach ($p->volumes as $v) {
                                                array_push($volumes, $v);
                                            }
                                        }
                                         //dd($volumes)
                                    @endphp

{{--                                    <p class="alert alert-danger">{{$product->id}}</p>--}}
                                    <div class="form-group">
                                        <label for="product">Product</label>
                                        <select class="form-control" name="product" id="product">
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="volume">Volume</label>
{{--                                        <select class="form-control" name="volume">--}}
{{--                                            @foreach($products->volume as $volume)--}}
{{--                                                <option value="{{$volume->id}}">{{$volume->volumeInMillilitres}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control"/>
                                    </div>
                                    <button type="submit" class="btn btn-danger my-3">Add</button>
                                </form>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session()->has('success'))
                                    <p class="alert alert-success">{{session()->get('success')}}</p>
                                 @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
