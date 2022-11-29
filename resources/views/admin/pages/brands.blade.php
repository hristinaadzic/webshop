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
                                    <th  scope="col">Name</th>
                                    <th  scope="col">Add</th>
                                    <th  scope="col">Delete</th>
                                    <th  scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$brand->name}}</td>
                                        <th scope="col"><a href="{{route('brands.create')}}" class="btn btn-success">Add</a></th>
                                        <th scope="col">
                                            <form>
                                                <input type="submit" class="btn btn-danger" name="addBrand" value="Delete"/>
                                            </form>
                                        </th>
                                        <th scope="col"><a href="{{route('brands.edit', ['brand'=>$brand->id])}}" class="btn btn-warning">Edit</a></th>
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
