@extends('layouts.app')

@section('content')
<div>
    <h2>Benvenuto nella Dashboard principale</h2>
    <p>Al momento ci sono {{ $count_portfolios }} portfolios</p>
</div>
@endsection