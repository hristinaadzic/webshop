@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if(session()->has('success'))
                    <p class="alert alert-success mt-3">{{session()->get('success')}}</p>
                @endif
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <table class=" table-hover table col-lg-10">
                                <thead>
                                <tr class="table-danger">
                                    <th  scope="col">#</th>
                                    <th  scope="col">Image</th>
                                    <th  scope="col">Name</th>
{{--                                    <th  scope="col">Description</th>--}}
                                    <th  scope="col">Gender</th>
                                    <th  scope="col">Brands</th>
                                    <th  scope="col">Categories</th>
                                    <th  scope="col">Volumes</th>
                                    <th  scope="col">Status</th>
                                    <th  scope="col">Delete</th>
                                    <th  scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td><img src="{{asset('assets/images/'.$product->image)}}" height="70" alt="{{$product->name}}"/></td>
                                        <td>{{$product->name}}</td>
{{--                                        <td><p class="text-break">{{$product->description}}</p></td>--}}
                                        <td>{{$product->genders->name}}</td>
                                        <td>{{$product->brands->name}}</td>
                                        <td>
                                            @foreach($product->categories as $cat)
                                                {{$cat->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($product->volumes as $vol)
                                                {{$vol->volumeInMillilitres}} ml
                                            @endforeach
                                        </td>
                                        <td>@if(!$product->isDeleted) Active
                                            @else Deactivated
                                            @endif</td>
                                        <th scope="col">
                                            <form action="{{route('products.destroy', ['product'=>$product->id])}}" method="POST">
                                                @csrf
                                                <input type="submit" class="btn btn-danger" name="deleteProduct" value="Change status"/>
                                            </form>
                                        </th>
                                        <th scope="col"><a href="{{route('products.edit', ['product'=>$product->id])}}" class="btn btn-warning">Edit</a></th>
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
