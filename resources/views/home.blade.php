@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero animi sunt facilis quia sed rem ex omnis ipsa quod, fugit adipisci odio, itaque recusandae amet?</p>
        </div>
    </div>
    <div class="container">
        <h2>No derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection