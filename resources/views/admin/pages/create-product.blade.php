@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel mt-1">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            @php
                            if(isset($product)){
                                $categoryIds = [];
                                $volumeIds = [];

                                foreach ($product->categories as $cat){
                                    array_push($categoryIds, $cat->id);

                                }

                                foreach ($product->volumes as $volume){
                                    array_push($volumeIds, $volume->id);
                                }
                            }
                            @endphp

                            <div class="col-md-6 mx-auto">
                                @if(isset($product))
                                    <form action="{{route('products.update', ['product'=>$product->id])}}" method="POST">
                                        @method("PUT")
                                @else
                                    <form action="{{route('products.store')}}" method="POST">
                                @endif
                                @csrf
                                    <div class="form-group">
                                        <label for="productName">Product name</label>
                                        <input type="text" name="productName" class="form-control" @if(isset($product)) ? value="{{$product->name}}" : value="" @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" rows="6" class="form-control">@if(isset($product)) {{($product->description)}} @endif</textarea>
                                    </div>
                                    <div class="form-group my-3">
                                        <label for="brand">Brand</label>
                                        <select class="form-control" name="brand">
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" @if(isset($product) && $product->brandId == $brand->id) selected @endif> {{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <ul class="list-group">
                                        <label for="gender">Gender</label>
                                        @foreach($genders as $gender)
                                            <li class="list-group-item">
                                                <input type="radio" name="gender"  value="{{$gender->id}}" @if(isset($product) && $product->genderId == $gender->id) checked @elseif(!isset($product) && $gender->id == 1) checked @endif/> {{$gender->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="list-group my-3">
                                        <label for="brand">Categories</label>
                                        @foreach($categories as $cat)
                                            <li class="list-group-item">
                                                <input type="checkbox" name="categories[]" id="category{{$cat->id}}" value="{{$cat->id}}" @if(isset($product) && in_array($cat->id, $categoryIds)) checked @endif/> {{$cat->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="list-group my-3">
                                        <label for="brand">Volumes</label>
                                        @foreach($volumes as $vol)
                                            <li class="list-group-item">
                                                <input type="checkbox" name="volumes[]" id="volume{{$vol->id}}" value="{{$vol->id}}" @if(isset($product) && in_array($vol->id, $volumeIds)) checked @endif/> {{$vol->volumeInMillilitres}} ml
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control"/>
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
