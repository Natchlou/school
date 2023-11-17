@php
    $class ??= null;
    $name ??= '';
    $label ??= ucfirst($name);
    $required ??= false;
@endphp
<div @class(['form-group mb-3', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($required == true)
        <span style="color: red;">*</span>
    @endif
    <select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror">
        @foreach ($subjects as $k => $v)
            <option value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
