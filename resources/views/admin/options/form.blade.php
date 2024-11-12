@extends('admin.admin')


@section('title',$option->exists ? "Editer un option" : "Créer une option")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ $option->exists ? route('admin.option.update', ['option' => $option->id]) : route('admin.option.store') }}" method="post">
        @csrf
        @if ($option->exists)
            @method("PATCH")
        @else
            @method("POST")
        @endif
        @include('shared.input',[ 'label'=>'Nom ', 'name' =>'name', 'value'=>$option->name])

        <div class="">
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Créer    
                @endif
            </button>
        </div>
    </form>
@endsection