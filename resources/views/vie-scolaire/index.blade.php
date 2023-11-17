@extends('layouts.vie-scolaire')
@section('title', 'Espace Vie Scolaire')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Liste des absences et retards non justifiés</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Élève</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recaps as $recap)
                                    <tr>
                                        <td scope="row">
                                            <a href="/dossier/{{ $recap->user_id }}">
                                                {{ $recap->user->name }}
                                            </a>
                                        </td>
                                        <td>{{ $recap->type }}</td>
                                        <td>{{ $recap->when }} et {{ $recap->time ?: '0' }} min</td>
                                        <td><a href="/vie-scolaire/justifier/{{ $recap->id }}">Justifier</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Aucune absences ou retards à justifiés</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
