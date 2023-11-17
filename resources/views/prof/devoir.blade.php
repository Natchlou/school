@extends('layouts.prof')
@section('title','Ajouter un devoir')
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
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
                        <div class="card-text">
                            <form action="" method="post">
                                @csrf
                                @include('shared.input', [
                                    'name' => 'date',
                                    'label' => 'Date du devoir',
                                    'required' => true,
                                    'type' => 'date',
                                ])
                                @include('shared.select', [
                                    'label' => 'Matière concernée',
                                    'subjects' => $matiere,
                                    'required' => true,
                                    'name' => 'timetable_id',
                                ])
                                @include('shared.input', [
                                    'name' => 'content',
                                    'label' => 'Contenu du devoir',
                                    'required' => true,
                                    'type' => 'textarea',
                                ])
                                <div class="form-group mb-3">
                                    <button class="btn btn-primary">Ajouter le devoir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
