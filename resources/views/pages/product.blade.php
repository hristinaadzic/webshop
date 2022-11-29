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
                    @foreach($product->volumes as $vol)
                        {{$vol->volumeInMillilitres}}ml
                    @endforeach
                </p>
            </div>
        </div>
    </div>
@endsection
