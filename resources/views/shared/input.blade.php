@php
$label ??= Str::ucfirst($name) ;  
$type ??= "text";
$class ??= null;
$name ??=''; 
$value ??=''; 

@endphp

<div @class(["form-group",$class]) class="form-control">
   <label for="{{$name}}">{{$label}}</label>
   @if($type == 'textarea')
   <textarea class="form-control @error($name)is-invalid @enderror" type="{{$type}}" name="{{$name}}" id="{{$name}}" >{{old('name',$value)}} </textarea>
   @else
   <input class="form-control @error($name)is-invalid @enderror" type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old('name',$value)}}">
   @endif
   @error($name)
        <div class="invalid-feedback">
            {{$message}}    
        </div>  
   @enderror
</div>