@extends('layouts.prof')
@section('title','Faire l\'appel')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="card-text">
                            <form action="" method="post">
                                @csrf
                                <div class="row">
                                    @include('shared.select', [
                                        'name' => 'type',
                                        'label' => 'Type',
                                        'subjects' => ['absence' => 'Absence', 'retard' => 'Retard'],
                                        'class' => 'col-6',
                                    ])
                                    @include('shared.select', [
                                        'name' => 'user_id',
                                        'label' => 'Élève concerné',
                                        'subjects' => $users,
                                        'class' => 'col-6',
                                    ])
                                </div>
                                <div class="row">
                                    @include('shared.input', [
                                        'name' => 'when',
                                        'label' => 'Quand',
                                        'class' => 'col-6',
                                        'type' => 'date',
                                    ])
                                    @include('shared.input', [
                                        'name' => 'time',
                                        'label' => 'Durée (en min)',
                                        'class' => 'col-6',
                                        'type' => 'number',
                                    ])
                                </div>
                                <div class="form-group">
                                    <div class="form-check col-6">
                                        <input class="form-check-input" type="checkbox" id="check" name="is_justify">
                                        <label class="form-check-label" for="check">
                                            Justifié ?
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group my-3">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
