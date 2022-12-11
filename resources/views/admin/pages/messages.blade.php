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
                                    <th  scope="col">First Name</th>
                                    <th  scope="col">Last Name</th>
                                    <th  scope="col">Email</th>
                                    <th  scope="col">Message</th>
                                    <th  scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($messages as $m)
                                    <tr>
                                        <th scope="row">{{$counter++}}</th>
                                        <td>{{$m->firstname}}</td>
                                        <td>{{$m->lastname}}</td>
                                        <td>{{$m->email}}</td>
                                        <td>{{$m->message}}</td>
                                        <td>{{$m->created_at}}</td>
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
