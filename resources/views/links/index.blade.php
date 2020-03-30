@extends('statamic::layout')
@section('title', 'Bitlynx')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">Bitlynx</h1>
    </div>
    {{ json_encode($links) }}
    <link-listing :links="{{ json_encode($links) }}"></form-listing>

@endsection