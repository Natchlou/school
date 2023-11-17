<li class="list-group-item d-flex justify-content-between align-items-center">
    <div>
        <span>
            <a href="{{ route('notes.show', $note->id) }}">
                {{ $note->timetable->matiere }}
            </a>
        </span>
        -
        <span>
            Note du {{ Carbon\Carbon::parse($note->date, 'Europe/Paris')->isoFormat('LL') }}
        </span>
    </div>
    <div>
        {{ $note->note }}
    </div>
</li>
