@extends('layouts.studient')
@section('title','Les notes')
@section('content')
    <div class="grid my-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card my-4">
                    <div class="card-body">
                        <h4 class="card-title text-center">Notes</h4>
                        <div class="card-text">
                            <div class="grid">
                                <ul class="list-group">
                                    @forelse ($notes as $note)
                                        @include('shared.appel.note')
                                    @empty
                                        <li class="list-group-item">
                                            <p>Pas de note</p>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card my-4">
                    <div class="card-body">
                        @if ($n != null)
                            <div class="card-text">
                                <h5>{{ $n->timetable->matiere }} - {{ date_format(date_create($n->date), 'd/m/Y') }}
                                </h5>
                                <p class="fw-bold">{{ $n->title }}</p>
                                <div class="table">
                                    <table class="table" style="width:250px;">
                                        <tbody>
                                            <tr>
                                                <td scope="row" class="fw-bold">Note de l'élève :</td>
                                                <td class="text-end fw-bold">{{ $n->note }}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">Coefficient :</td>
                                                <td class="text-end">{{ $n->coeff }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
