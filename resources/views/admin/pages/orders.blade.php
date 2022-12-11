@extends('layouts.admin-layout')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <table class=" table-hover table col-lg-10">
                                <thead>
                                <tr class="table-danger">
                                    <th  scope="col">#</th>
                                    <th  scope="col">User</th>
                                    <th  scope="col">Product Name</th>
                                    <th  scope="col">Quantity</th>
                                    <th  scope="col">Total</th>
                                    <th  scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                //dd($orders);
                                @endphp
                                @foreach($orders as $order)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$order->user->firstName}} {{$order->user->lastName}}</td>
                                        <td>
                                            @foreach($order->order_lines as $line)
                                                {{$line->productName}} </br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($order->order_lines as $line)
                                                {{$line->quantity}} </br>
                                            @endforeach
                                        </td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->created_at}}</td>
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
