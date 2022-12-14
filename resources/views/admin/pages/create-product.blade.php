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
                                $prices = [];
                                foreach ($product->prices as $p){
                                    array_push($prices, $p);
                                }
                                //dd($prices);
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
                                    <form action="{{route('products.update', ['product'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                                        @method("PUT")
                                @else
                                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                @endif
                                @csrf
                                    <div class="form-group">
                                        <label for="productName">Product name</label>
                                        <input type="text" name="productName" class="form-control @error('productName') is-invalid @enderror" @if(isset($product)) ? value="{{$product->name}}" : value="" @endif/>
                                    </div>
                                        @error('productName')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" rows="6" class="form-control @error('description') is-invalid @enderror">@if(isset($product)) {{($product->description)}} @endif</textarea>
                                    </div>
                                        @error('description')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <div class="form-group my-3">
                                        <label for="brand">Brand</label>
                                        <select class="form-control @error('brand') is-invalid @enderror" name="brand">
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" @if(isset($product) && $product->brandId == $brand->id) selected @endif> {{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                        @error('brand')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <ul class="list-group">
                                        <label for="gender">Gender</label>
                                        @foreach($genders as $gender)
                                            <li class="list-group-item @error('gender') is-invalid @enderror">
                                                <input type="radio" name="gender"  value="{{$gender->id}}" @if(isset($product) && $product->genderId == $gender->id) checked @elseif(!isset($product) && $gender->id == 1) checked @endif/> {{$gender->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                        @error('gender')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <ul class="list-group my-3">
                                        <label for="categories">Categories</label>
                                        @foreach($categories as $cat)
                                            <li class="list-group-item @error('categories') is-invalid @enderror">
                                                <input type="checkbox" name="categories[]" id="category{{$cat->id}}" value="{{$cat->id}}" @if(isset($product) && in_array($cat->id, $categoryIds)) checked @endif/> {{$cat->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                        @error('categories')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                        <ul class="list-group my-3">
                                            <label for="volumes">Volumes</label>
                                            @foreach($volumes as $vol)
                                                <li class="list-group-item">
                                                    <input type="checkbox" name="volumes[]" id="volume{{$vol->id}}" value="{{$vol->id}}" @if(isset($product) && in_array($vol->id, $volumeIds)) checked @endif/> {{$vol->volumeInMillilitres}} ml
                                                </li>
                                            @endforeach
                                        </ul>
                                        @error('volumes')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        @if(isset($product))
                                            <img src="{{asset('assets/images/'.$product->image)}}" class="card-img-top @error('image') is-invalid @enderror"/>
                                        @endif
                                        <input type="file" name="image" class="form-control" @if(isset($product)) value="{{($product->image)}}" @endif/>
                                    </div>
                                        @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    <button type="submit" class="btn btn-danger my-3">Add</button>
                                </form>
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
