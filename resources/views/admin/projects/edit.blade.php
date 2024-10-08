@extends('layouts.app')

@section('content')
<div class="py-2 px-4">
    <h2>Modifica il tuo project</h2>
    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
        @csrf

        @method('PUT')
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $project->name) }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Percorso immagine</label>
            <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" name="img"
                value="{{ old('img', $project->img) }}">
            @error('img')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <textarea class="form-control" name="description" id="description" cols="30"
                rows="10">{{ old('description', $project->description) }}</textarea>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Crea</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
        </div>

    </form>
</div>
@endsection