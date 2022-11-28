@extends("layouts.layout")
@section('content')
    </br>
</br>
</br>
</br>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-md-6 offset-3">
                <form action="{{route('doLogin')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Log in</button>
                </form>
                @if(session()->has('msg'))
                    <p class="alert alert-danger">{{session()->get('msg')}}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
