@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Dashboard') }}
                        <a href="/epk/create">Nieuw</a>
                    </div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="GET" action="{{ route('home') }}">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Zoek voor bands..." autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary">Zoek</button>
                        </form>

                        @if ($bands->isNotEmpty())
                            <div class="row">
                                @foreach ($bands as $band)
                                    <div class="col-md-3">
                                        <h3>{{ $band->name }}</h3>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Geen bands gevonden.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
