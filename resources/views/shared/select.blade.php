
@php
$label ??= Str::ucfirst($name) ;  
$class ??= null;
$name ??=''; 
$value ??=''; 

@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" @if($multiple) multiple @endif class="form-control">
        @foreach ($options as $key => $v)
            <option value="{{ $key }}" @selected($value && $value->contains($key))>{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}    
        </div>  
    @enderror
</div>
