<li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
        <span class="fw-bold">{{ Carbon\Carbon::parse($appel->date, 'Europe/Paris')->isoFormat('LL') }}</span>
        <br>
        <span>{{ $appel->matiere }}</span>
    </div>
    <span class="badge bg-primary rounded-pill">{{ $appel->classe }}</span>
</li>
