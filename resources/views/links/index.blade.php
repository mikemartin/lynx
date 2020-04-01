@extends('statamic::layout')
@section('title', 'Bitlynx')

@section('content')
    <header class="mb-3">
        @include('statamic::partials.breadcrumb', [
            'url' => cp_route('utilities.index'),
            'title' => __('Utilities')
        ])
        <div class="flex items-center justify-between">
            <h1>{{ __('Bitlynx') }}</h1>
        </div>
    </header>
    
    <links-listing :links="{{ json_encode($links) }}"></links-listing>
@endsection