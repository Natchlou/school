@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= '';
    $required ??= false;
    $step ??= 1;
    $min ??= 1;
    $max ??= 255;
    $readonly ??= false;
    $multiple ??= false;
@endphp
<div @class(['form-group mb-3', $class])>
    @if ($label != '')
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    @if ($required == true)
        <span style="color: red;">*</span>
    @endif
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}"
            name="{{ $name }}" @if ($readonly === true) readonly @endif>{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" id="{{ $name }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" autocomplete="off"
            @if ($type === 'number') step="{{ $step }}"
            min="{{ $min }}" max="{{ $max }}" @endif
            @if ($readonly === true) readonly @endif @if ($multiple === true) multiple @endif>
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
