@extends('layouts.layout')
@section('content')
    <div class="container py-5 mt-5">
        <div class="row d-flex justify-content-between mt-5">
            <div class="col-md-5 mx-auto">
                <div class="img-top">
                    <img src="{{asset('assets/images/'.$product->image)}}"/>
                </div>
            </div>
            <div class="col-md-7">
                <h4>{{$product->name}}</h4><hr/>
                <p>{{$product->description}}</p><hr/>
                <p class="fw-bolder">Brand: {{$product->brands->name}}</p><hr/>
                <p class="fw-bolder">Categories:
                    @foreach($product->categories as $cat)
                        {{$cat->name }}
                    @endforeach
                </p>
                <p> Sizes available:
                <ul class="list-group">
                    @foreach($product->volumes as $volume)
                        <li class="list-group-item">
                            <input type="checkbox" name="categories[]" id="volume{{$volume->id}}" value="{{$volume->id}}"/> {{$volume->volumeInMillilitres}} ml
                        </li>
                    @endforeach
                </ul>
                </p>
                @if(session()->has('user'))
                    <button type="button" onclick="addToCart({{$product->id}})" class="btn btn-danger mt-3 cart-btn">Add To Cart</button>
                @endif
            </div>
        </div>
    </div>
@endsection
