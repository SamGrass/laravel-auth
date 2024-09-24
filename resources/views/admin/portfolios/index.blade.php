@extends('layouts.app')

@section('content')
<div class="py-2 px-4">
    @if(session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
    <h2>I tuoi Portfoli</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Immagine</th>
                <th scope="col">Data di creazione</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $portfolio)
            <tr>
                <th>{{ $portfolio->id }}</th>
                <td>{{ $portfolio->name }}</td>
                <td><img width="15%" class="img-fluid" src="{{ $portfolio->img }}" alt=""></td>
                <td>{{ $portfolio->created_at->format('d/m/Y') }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.portfolios.show', $portfolio) }}" class="btn btn-success"><i
                                class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-warning"><i
                                class="fa-solid fa-pencil"></i></a>
                        @include('admin.partials.deletebtn')
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $portfolios->links() }}
</div>
@endsection