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
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Category name</label>
                        <input type="text" name="categoryName" class="form-control"/>
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
@endsection
