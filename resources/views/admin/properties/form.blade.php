@extends('admin.admin')


@section('title',$property->exists ? "Editer un bien" : "Créer un nouveau bien")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{ $property->exists ? route('admin.property.update', ['property' => $property->id]) : route('admin.property.store') }}" method="post">
        @csrf
        @method($property->exists ?'PUT' :"POST")
        <div class="row">
                @include('shared.input',['class'=>'col','label' =>'Titre', 'name' =>'title','value'=>$property->title])
            <div class="col row">
                @include('shared.input',['class'=>'col', 'name' =>'surface','value'=>$property->surface])
                @include('shared.input',['class'=>'col', 'label' =>'prix ', 'name' =>'price', 'value'=>$property->price])

            </div>
        </div>
                @include('shared.input',['type'=>'textarea', 'class'=>'col ', 'name' =>'description', 'value'=>$property->description])
        <div class="row">
            @include('shared.input',['label' =>'Pièce', 'class'=>'col ', 'name' =>'rooms', 'value'=>$property->rooms])
            @include('shared.input',['label' =>'Chambre', 'class'=>'col ', 'name' =>'bedrooms', 'value'=>$property->bedrooms])
            @include('shared.input',['label' =>'Étage', 'class'=>'col ', 'name' =>'floor', 'value'=>$property->floor])
        </div>
      
        <div class="row">
            @include('shared.input',['label' =>'Adresse', 'class'=>'col ', 'name' =>'adress', 'value'=>$property->adress])
            @include('shared.input',['label' =>'Ville', 'class'=>'col ', 'name' =>'city', 'value'=>$property->city])
            @include('shared.input',['label' =>'Code Postal', 'class'=>'col ', 'name' =>'code_postal', 'value'=>$property->code_postal])
        </div>
        @include('shared.select', [
            'label' => 'Options', 
            'class' => 'col', 
            'name' => 'options[]',  // Formaté en tableau
            'value' => $property->options()->pluck('options.id'),
            'multiple' => true
        ])        
        @include('shared.checkbox',['label' =>'Vendu', 'class'=>'col ', 'name' =>'sold', 'value'=>$property->sold,'options'=>$options])

        <div class="">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer    
                @endif
            </button>
        </div>
    </form>
@endsection