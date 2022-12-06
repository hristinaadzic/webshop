@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel mt-5">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">

                            <div class="col-md-6 mx-auto">
                                @if(isset($volume))
                                    <form action="{{route('volumes.update', ['volume'=>$volume->id])}}" method="POST">
                                        @method("PUT")
                                        @else
                                            <form action="{{route('volumes.store')}}" method="POST">
                                        @endif
                                    @csrf
                                    <div class="form-group">
                                        <label for="volume">Volume in millilitres</label>
                                        <input type="text" name="volume" class="form-control" @if(isset($volume)) ? value="{{$volume->volumeInMillilitres}}" : value="" @endif/>
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
