@extends('base')
@section('title',$property->title)

@section('content')
<div class="container">

<h1>{{$property->title}}</h1>
<h2>{{$property->rooms}} pièces - {{$property->surface}}</h2>
<div class="text-primary fw-bold" style="font-size:4rem">
    {{ number_format($property->price, 2, ',', ' ');}} $
</div>
<hr>
<div class="mt-4">
    <h4>
        Interessé par ce bien ?
    </h4>
    @include('shared.flash')

    <form action="{{route('property.contact',$property)}}" method="post" class="vstack gap-3">
        @csrf
        <div class="row">
            @include('shared.input',['class'=>'col','label' =>'prenom', 'name' =>'firstname'])
            @include('shared.input',['class'=>'col','label' =>'nom', 'name' =>'lastname'])
        </div>
        <div class="row">
            @include('shared.input',['class'=>'col','label' =>'Téléphone', 'name' =>'tele'])
            @include('shared.input',['class'=>'col','label' =>'Email', 'name' =>'email'])
        </div>
        @include('shared.input',['type'=>'textarea','class'=>'col','label' =>'Votre Message', 'name' =>'message'])
        <div>
            <button class="btn btn-primary">
                Nous contacter
            </button>
        </div>
    </form>
</div>
<div class="mt-4">
    <p>{{ nl2br($property->description) }}</p>
    <div class="row mb-5">
        <div class="col-8">
            <h2>Caractéristique</h2>
            <table class="table table-striped">
                <tr>
                    <td>
                        Surface habitable
                    </td>
                    <td>
                        {{$property->surface}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Pièces
                    </td>
                    <td>
                        {{$property->rooms}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Chambres
                    </td>
                    <td>
                        {{$property->bedrooms}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Étage
                    </td>
                    <td>
                        {{$property->floor ?? 'Rez de chaussé'}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h2>Spécificités</h2>
            <ul class="list-group">
                @foreach ($property->options as $option)
                    <div class="list-group-item">
                        {{$option->name}}
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</div>

@endsection
