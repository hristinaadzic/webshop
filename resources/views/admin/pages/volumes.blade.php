@extends('layouts.admin-layout')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if(session()->has('success'))
                    <p class="alert alert-success mt-3">{{session()->get('success')}}</p>
                @endif
                <div class="col-lg-10 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            <table class=" table-hover table col-lg-10">
                                <thead>
                                <tr class="table-danger">
                                    <th  scope="col">#</th>
                                    <th  scope="col">Volume</th>
                                    <th  scope="col">Status</th>
                                    <th  scope="col">Add</th>
                                    <th  scope="col">Delete</th>
                                    <th  scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($volumes as $volume)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$volume->volumeInMillilitres}} ml</td>
                                        <td>@if(!$volume->isDeleted) Active
                                            @else Deactivated
                                        @endif</td>
                                        <th scope="col"><a href="{{route('volumes.create')}}" class="btn btn-success">Add</a></th>
                                        <th scope="col">
                                            <form action="{{route('volumes.destroy', ['volume' => $volume->id])}}" method="POST">
                                                @csrf
                                                <input type="submit" class="btn btn-danger" name="deleteVolume" value="Change status"/>
                                            </form>
                                        </th>
                                        <th scope="col"><a href="{{route('volumes.edit', ['volume'=>$volume->id])}}" class="btn btn-warning">Edit</a></th>
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
