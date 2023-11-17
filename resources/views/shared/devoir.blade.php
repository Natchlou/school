@php
    $do ??= false;
    $id ??= 0;
@endphp
<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center user-select-none">
        <span class="fw-bold">{{ $devoir->timetable->matiere }}</span>
        <span class="badge bg-secondary">{{ Carbon\Carbon::make($devoir->date)->diffForHumans() }}</span>
    </div>
    <div class="w-100">
        <p>
            {{ $devoir->content }}
        </p>
    </div>
</li>
