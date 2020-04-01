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
    
    <div class="card p-0 mb-4">
        <div class="p-2">
            <div class="flex justify-between items-center">
                <div class="pr-4">
                    <h2 class="font-bold">{{ __('Connect Bitly account') }}</h2>
                    <p class="text-grey text-sm my-1">Create short links and access your link statistics.</p>
                </div>
                
                @if ($oauth)
                  <div class="login-oauth-providers">
                      @foreach ($providers as $provider)
                          <div class="provider mb-1">
                              <a href="{{ $provider->loginUrl() }}?redirect={{ parse_url(cp_route('index'))['path'] }}" class="btn block btn-primary">
                                  {{ __('Log in with :provider', ['provider' => $provider->label()]) }}
                              </a>
                          </div>
                      @endforeach
                  </div>
              @endif
            </div>
        </div>
    </div>

@endsection