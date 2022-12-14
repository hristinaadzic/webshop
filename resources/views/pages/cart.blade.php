@extends('layouts.layout')
@section('content')

        <div class="container py-5 mt-5">
            <div class="row d-flex justify-content-center align-items-center h-100 mt-5">
                <form action="{{route('order')}}" method="POST">
                    @csrf
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        @if(session()->has('cartItems') && count(session()->get('cartItems')) > 0)
                            <div class="card-body p-0">
                                <div class="row g-0 d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            </div>
                                            <hr class="my-4">
                                            @foreach(session()->get('cartItems') as $item)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">

                                                    <img
                                                        src="{{asset('assets/images/'.$item->product->image )}}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">{{$item->product->name}}</h6>
                                                    <h6 class="text-black mb-0">{{$item->product->brands->name}}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">{{$item->quantity}}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">{{$item->price->priceValue}}</h6>
                                                </div>
                                            </div>

                                            <hr class="my-4">
                                            @endforeach
                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="{{route('home')}}" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                            <hr class="my-4">
                                            @php
                                                $totalPrice = 0;
                                                foreach (session()->get('cartItems') as $item){
                                                    $totalPrice += $item->quantity * $item->price->priceValue;
                                                }
                                            @endphp
                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Total price</h5>
                                                <h5>{{$totalPrice}} $</h5>
                                            </div>

                                            <button type="submit" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">Order</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p class="alert alert-danger py-5 text-center">There is no products in cart</p>
                        @endif
                            @if(session()->has('success'))
                                <p class="alert alert-success">{{session()->get('success')}}</p>
                            @endif
                    </div>
                </div>
                </form>
            </div>
        </div>

@endsection
