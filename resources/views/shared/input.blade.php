@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    $multiple ??=false;
@endphp




<div @class(['form-group', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if ($type == 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>       
    @elseif($type == 'file')
        <input class="form-control @error($name) is-invalid @enderror" type="file" name="{{ $name }}[]" accept="image/*" multiple>
        <input type="hidden" name="has_images" value="0"> </td>
    @else 
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}{{$multiple ? "[]" : ''}}" value="{{ old($name, $value) }}" >
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>