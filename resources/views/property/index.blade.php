@extends('base')

@section('title','Tous nos bien')

@section('content')
<div class="bg-light p-5 mb-5 text-container">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" name="price" value="{{$input['price'] ?? ''}}" id="price" placeholder="Budget max" class="form-control">
        <input type="number" name="rooms" value="{{$input['rooms'] ?? ''}}" id="rooms" placeholder="rooms " class="form-control">
        <input type="number" name="surface" value="{{$input['surface'] ?? ''}}" id="surface" placeholder="Surface " class="form-control">
        <input type="text" name="title" value="{{$input['title'] ?? ''}}" id="title" placeholder="Mot clef " class="form-control">
        <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
    </form>
</div>
<div class="container mt-5">
    <div class="row mb-4">
        @foreach ($properties as $property)
        <div class="col-3">
            @include('property.card')
        </div>
      
    @endforeach
    </div>
    <div class="container my-4">

        {{$properties->links()}}
    </div>
    
</div>








@endsection