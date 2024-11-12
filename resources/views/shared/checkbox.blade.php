@php
$class ??= null
@endphp

<div @class(["form-check form-switch",$class])>
    <label for="{{$name}}" class="form-check-label">{{$label}}</label>
    <input type="hidden" value="0" name="{{$name}}">
    <input @checked(old($name,$value ?? false)) type="checkbox" name="{{$name}}" value="1" class="form-check-input" @error($name) is-invalid @enderror role="switch" id="{{$name}}">
    @error($name)
        <div class="invalid-feedback">
            {{$message}}    
        </div>  
    @enderror

</div>