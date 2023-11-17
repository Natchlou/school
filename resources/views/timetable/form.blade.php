@extends('layouts.direction')
@section('title', $timetable->exists ? 'Éditer une timetable' : 'Ajouter une timetable')
@section('content')
    <h1>@yield('title')</h1>
    <form action="{{ route($timetable->exists ? 'timetable.update' : 'timetable.store', $timetable) }}" method="post"
        class="vstack gap-2">
        @csrf
        @method($timetable->exists ? 'put' : 'post')
        <input type="hidden" name="absent" value="{{ $timetable->absent }}">
        <div class="row">
            @include('shared.input', [
                'name' => 'matiere',
                'label' => 'Matière',
                'value' => $timetable->matiere,
                'class' => 'col-6',
            ])
            @include('shared.input', [
                'name' => 'color',
                'label' => 'Couleur',
                'value' => $timetable->color,
                'type' => 'color',
                'class' => 'col-6',
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'name' => 'prof',
                'label' => 'Professeur',
                'value' => $timetable->prof,
                'class' => 'col-6',
            ])
            @include('shared.input', [
                'name' => 'salle',
                'label' => 'Salle',
                'value' => $timetable->salle,
                'class' => 'col-6',
            ])
        </div>
        <div class="row">
            @include('shared.input', [
                'name' => 'start_at',
                'label' => 'Commence à',
                'value' => $timetable->start_at,
                'class' => 'col-6',
                'type' => 'time'
            ])
            @include('shared.input', [
                'name' => 'end_at',
                'label' => 'Fin à',
                'value' => $timetable->end_at,
                'class' => 'col-6',
                'type' => 'time'
            ])
        </div>
        <div>
            <button class="btn btn-primary">
                @if ($timetable->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
