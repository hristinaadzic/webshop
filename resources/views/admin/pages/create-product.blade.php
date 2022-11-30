@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel mt-5">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <div class="col-md-6 mx-auto">
                                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="productName">Product name</label>
                                        <input type="text" name="productName" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <select class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <input type="checkbox" name="categories[]" id="category" value=""/>
                                        </li>
                                    </ul>
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
