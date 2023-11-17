@php
    $type ??= 'primary';
@endphp

<div class="alert alert-{{ $type }}" role="alert">
    {{ $slot }}
</div>