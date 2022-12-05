@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel mt-5">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <div class="col-md-6 mx-auto">
                                @if(isset($brand))
                                    <form action="{{route('brands.update', ['brand'=>$brand->id])}}" method="POST">
                                        @method("PUT")
                                @else
                                    <form action="{{route('brands.store')}}" method="POST">
                                @endif
                                    @csrf
                                    <div class="form-group">
                                        <label for="brandName">Brand name</label>
                                        <input type="text" name="brandName" class="form-control" @if(isset($brand)) ? value="{{$brand->name}}" : value="" @endif/>
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
