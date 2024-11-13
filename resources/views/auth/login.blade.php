@extends('base')

@section('title','Se connecter')
    
@section('content')
    <div class="mt-4 container">
            <h1>@yield('title')</h1>
            @include('shared.flash')

            <form action="{{route('doLogin')}}" method="post" class="vstack gap-3 mt-3">
                @csrf
                @include('shared.input',['label' =>'Email', 'class'=>'col ', 'name' =>'email', 'type'=>'email'])
                @include('shared.input',['label' =>'Mot de passe', 'class'=>'col ', 'name' =>'password','type'=>'password'])
                <div>
                    <button class="btn btn-primary" type="submit">
                        Se connecter
                    </button>
                </div>
            </form>
    </div>
@endsection