@extends('layouts.direction')
@section('title', 'Toutes les matières')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('timetable.create') }}" class="btn btn-primary">Ajouter une matière</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Matière</th>
                    <th scope="col">Salle</th>
                    <th scope="col">Professeur</th>
                    <th scope="col">Heure début</th>
                    <th scope="col">Heure fin</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($timetables as $timetable)
                    <tr>
                        <td scope="row">{{ $timetable->matiere }}</td>
                        <td>{{ $timetable->salle }}</td>
                        <td>{{ $timetable->prof }}</td>
                        <td>{{ $timetable->start_at }}</td>
                        <td>{{ $timetable->end_at }}</td>
                        <td class="text-end">
                            <a href="{{ route('timetable.edit', $timetable) }}" class="btn btn-success">Modifier</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-danger">
                                Aucune matière enregistrée pour le moment !
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
