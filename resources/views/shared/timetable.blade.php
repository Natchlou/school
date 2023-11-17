<div class="row" style="padding-bottom: 4px;">
    <div class="col-3 text-start">
        <div>{{ $cour->start_at }}</div>
        <br>
        <div>{{ $cour->end_at }}</div>
    </div>
    <div class="col-6" style="border-left: 5px solid {{ $cour->color }}">
        <span>{{ $cour->matiere }}</span><br>
        <span>{{ $cour->prof }}</span><br>
        <span>{{ $cour->salle }}</span>
    </div>
    <div class="col-3 text-end">
        <br>
        <br>
        @if ($cour->absent == 1)
            <span class="badge bg-danger rounded-pill">Prof. absent</span>
        @endif
    </div>
</div>