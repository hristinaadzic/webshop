@extends("layouts.layout")
@section('content')
    </br>
</br>
</br>
</br>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <form action="{{route('doRegister')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror"/>
                </div>
                @error('firstname')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"/>
                </div>
                @error('lastname')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"/>
                </div>
                @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"/>
                </div>
                @error('password')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-danger my-3">Register</button>
            </form>
            @if(session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
            @endif
            @if(session()->has('error'))
                <p class="alert alert-success">{{session()->get('error')}}</p>
            @endif
        </div>
    </div>
</div>
@endsection
