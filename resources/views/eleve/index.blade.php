@extends('layouts.studient')
@section('title','Espace élève')
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
                                    @include('shared.timetable')
                                @empty
                                    <p>Pas de cours</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Travail à faire pour les prochains jours</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($devoirs as $devoir)
                                        @include('shared.devoir')
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Dernières ressources pédagogiques</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($ressources as $ressource)
                                        @include('shared.ressource')
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Vie Scolaire</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($recaps as $recap)
                                        @include('shared.appel.absence')
                                    @empty
                                        <li class="list-group-item text-center fw-bold">Aucune absence ou retard</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Dernières notes</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($notes as $note)
                                        @include('shared.appel.note')
                                    @empty
                                        <li class="list-group-item text-center fw-bold">Aucune note pour le moment</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
