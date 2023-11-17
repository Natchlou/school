@extends('layouts.prof')
@section('title', $note->exists ? 'Éditer une note' : 'Ajouter une note')
@section('content')
    <div class="container my-5">
        <h1>@yield('title')</h1>
        <form action="{{ route($note->exists ? 'note.update' : 'note.store', $note) }}" method="post" class="vstack gap-2">
            @csrf
            @method($note->exists ? 'put' : 'post')
            <div class="row">
                @include('shared.select', [
                    'name' => 'user_id',
                    'label' => 'Élève',
                    'subjects' => $users,
                    'class' => 'col-6',
                ])
                @include('shared.select', [
                    'name' => 'timetable_id',
                    'label' => 'Matière',
                    'subjects' => $timetables,
                    'class' => 'col-6',
                ])
            </div>
            <div class="row">
                @include('shared.input', [
                    'name' => 'title',
                    'label' => 'Titre de la note',
                    'value' => $note->title,
                    'class' => 'col-3',
                ])
                @include('shared.input', [
                    'name' => 'note',
                    'label' => 'Note de l\'élève',
                    'value' => $note->note,
                    'type' => 'number',
                    'class' => 'col-3',
                ])
                @include('shared.input', [
                    'name' => 'coeff',
                    'label' => 'Coefficient de la note',
                    'value' => $note->coeff,
                    'type' => 'number',
                    'class' => 'col-3',
                ])
                @include('shared.input', [
                    'name' => 'date',
                    'label' => 'Date de la note',
                    'value' => $note->date,
                    'type' => 'date',
                    'class' => 'col-3',
                ])
            </div>
            <div>
                <button class="btn btn-primary">
                    @if ($note->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
