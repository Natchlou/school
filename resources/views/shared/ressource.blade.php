<li class="list-group-item">
    <div class="wrap">
        <span class="fw-bold">
            Ressource
        </span>
        <div>
            <a href="/storage/{{ $ressource->filepath }}" target="_blank" style="max-width:35rem;">
                <div>
                    {{ $ressource->filename }} ({{ $ressource->bytesToHuman($ressource->sizefile) }})
                </div>
            </a>
        </div>
    </div>
</li>
