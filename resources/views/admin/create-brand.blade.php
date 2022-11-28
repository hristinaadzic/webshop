@extends('layouts.layout')
@section('content')
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="{{route('brand.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="brandName">Brand name</label>
                        <input type="text" name="brandName" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-danger my-3">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
