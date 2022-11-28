@extends('layouts.layout')
@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            @if(session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
            @endif
            @if(session()->has('error'))
                <p class="alert alert-success">{{session()->get('error')}}</p>
            @endif
            <table class=" table-hover table table-responsive">
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
                        <th scope="col"><a href="{{route('create-brand')}}" class="btn btn-success">Add</a></th>
                        <th scope="col">
                            <form>
                                <input type="submit" class="btn btn-danger" name="addBrand" value="Delete"/>
                            </form>
                        </th>
                        <th scope="col"><a href="{{route('brand.edit', ['brand'=>$brand->id])}}" class="btn btn-warning">Edit</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
