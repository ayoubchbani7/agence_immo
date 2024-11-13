<div class="container mt-5">
        @session('success')
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endsession
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>     
        @endif
        @yield('content')
    </div>