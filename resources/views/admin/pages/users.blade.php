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
                                    <th  scope="col">First name</th>
                                    <th  scope="col">Last name</th>
                                    <th  scope="col">Email</th>
                                    <th  scope="col">Role</th>
                                    <th  scope="col">Delete</th>
                                    <th  scope="col">Edit</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$user->firstName}}</td>
                                        <td>{{$user->lastName}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->roles->name}}</td>
                                        <td>
                                            <form>
                                                <input type="submit" class="btn btn-danger" name="deleteUser" value="Delete"/>
                                            </form>
                                        </td>
                                        <th scope="col"><a href="{{route('users.edit', ['user'=>$user->id])}}" class="btn btn-warning">Edit</a></th>
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
