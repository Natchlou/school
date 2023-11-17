@extends('layouts.prof')
@section('title', $file->exists ? 'Éditer une ressource' : 'Ajouter une ressource')
@section('content')
    <div class="container my-5">
        <h1>@yield('title')</h1>
        <form action="{{ route($file->exists ? 'file.update' : 'file.store', $file) }}" method="post" class="vstack gap-2"
            enctype="multipart/form-data">
            @csrf
            @method($file->exists ? 'put' : 'post')
            <div class="row">
                @include('shared.input', [
                    'label' => 'Fichier',
                    'type' => 'file',
                    'name' => 'filename',
                    'value' => $file->filename,
                ])
            </div>
            <div>
                <button class="btn btn-primary">
                    @if ($file->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
@endsection
