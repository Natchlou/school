@extends('layouts.prof')
@section('title','Espace Professeur')
@section('content')
    <div class="grid my-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Emploi du temps</h4>
                        <div class="card-text">
                            <div class="grid">
                                @forelse ($cours as $cour)
                                    @include('shared.timetable', ['cour' => $cour])
                                @empty
                                    <p>Pas de cours</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Appel non faits (0)</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($appels as $appel)
                                        @include('shared.appel', ['appel' => $appel])
                                    @empty
                                        <li class="list-group-item text-center fw-bold">Toutes les appels ont bien été fait
                                            !</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Cah. de textes non saisis (0)</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($cahiers as $cahier)
                                        @include('shared.cahier', ['cahier' => $cahier])
                                    @empty
                                        <li class="list-group-item text-center fw-bold">Toutes les appels ont bien été fait
                                            !</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Agenda ({{ $agendas->count() }})</h4>
                        <div class="card-text">
                            <ul class="list-group">
                                @forelse ($agendas as $agenda)
                                    @include('shared.agenda')
                                @empty
                                    <li class="list-group-item text-center fw-bold">Aucun nouveau évènement</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Informations & Sondages</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    <li class="list-group-item text-center fw-bold">Aucun noueau évènement</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
