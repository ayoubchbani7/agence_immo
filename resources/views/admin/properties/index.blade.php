@extends('admin.admin')
@section('title','Tous nos bien')
@section('content')
        <div class="d-flex justify-content-between align-items-center">
            <h1>Tous nos bien</h1>
            <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Ville</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{$property->title}}</td>
                        <td>{{$property->surface}}</td>
                        <td>{{ number_format($property->price , thousands_separator:' ') }}</td>
                        <td>{{$property->city}}</td>
                        <td>  
                            <div class="d-flex gap-2 w-100 justify-content-end">
                                <a href="{{route('admin.property.edit',$property)}}" class="btn btn-primary">Editer</a>
                                <form action="{{route('admin.property.destroy',$property)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>
                            </div> 
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{$properties->links()}}
@endsection