@extends('layouts.admin-layout')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if(session()->has('success'))
                    <p class="alert alert-success mt-3">{{session()->get('success')}}</p>
                @endif
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                                <table class=" table-hover table col-lg-10">
                                    <thead>
                                    <tr class="table-danger">
                                        <th  scope="col">#</th>
                                        <th  scope="col">Product</th>
                                        <th  scope="col">Volume</th>
                                        <th  scope="col">Price</th>
                                        <th  scope="col">Add</th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach($products as $product)
                                        <tr>
                                            <th scope="row">{{$counter++}}</th>
                                            <td>{{$product->name}}</td>
                                            <td>
                                                @foreach($product->volumes as $vol)
                                                    {{$vol->volumeInMillilitres}} ml<br/>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($product->prices as $p)
                                                    {{$p->priceValue}} $<br/>
                                                @endforeach
                                            </td>
                                            <th scope="col"><a href="{{route('prices.create')}}" class="btn btn-success">Add</a></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
