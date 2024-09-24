@extends('layouts.app')

@section('content')
<div class="py-2 px-4">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex gap-2">
        <h2>Dettagli del Portfolio: {{ $portfolio->name }}</h2>
        <div>
            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-warning"><i
                    class="fa-solid fa-pencil"></i></a>
        </div>
        @include('admin.partials.deletebtn')
    </div>

    <p>Creato il: {{ $portfolio->created_at->format('d/m/Y') }}</p>
    <img class="img-fluid" src="{{ $portfolio->img }}" alt="">
    <h3>Descrizione</h3>
    <p>{{ $portfolio->description }}</p>
</div>
@endsection