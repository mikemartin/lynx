@extends('statamic::layout')
@section('title', 'Bitlynx')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Bitlynx</h1>
    </div>
    <links-listing :links="{{ json_encode($links) }}"></links-listing>

@endsection