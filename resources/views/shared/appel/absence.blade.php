<li class="list-group-item user-select-none">
    <span class="fw-bold @if ($recap->is_justify === 'off') text-danger @endif">
        @if ($recap->type == 'absence' && $recap->is_justify === 'off')
            <i class="bi bi-person-x"></i> Absence non justifiée
        @endif
        @if ($recap->type == 'absence' && $recap->is_justify === 'on')
            <i class="bi bi-person-x"></i> Absence justifiée
        @endif
        @if ($recap->type == 'retard' && $recap->is_justify === 'off')
            <i class="bi bi-clock-history"></i> Retard non justifié
        @endif
        @if ($recap->type == 'retard' && $recap->is_justify === 'on')
            <i class="bi bi-clock-history"></i> Retard justifié
        @endif
    </span>
    <br>
    <span class="@if ($recap->is_justify === 'off') text-danger @endif">
        Le {{ Carbon\Carbon::parse($recap->when, 'Europe/Paris')->isoFormat('LL') }}
        @if ($recap->type == 'retard')
            de {{ $recap->time }} min
        @endif
    </span>
</li>
