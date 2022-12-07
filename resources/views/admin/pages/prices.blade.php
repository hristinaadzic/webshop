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

                            @if(count($prices) == 0)
                                <p class="alert alert-danger">There is no orders</p>
                            @else
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
                                    @foreach($prices as $price)
                                        <tr>
                                            <th scope="row">{{$counter++}}</th>
                                            <td>{{$price->products()->name}}</td>
                                            <td>{{$price->volumes()->volumeInMillilitres}}</td>
                                            <th scope="col"><a href="{{route('prices.create')}}" class="btn btn-success">Add</a></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
