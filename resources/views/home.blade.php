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
                                <input type="text" name="search" class="form-control" placeholder="Zoek voor bands..."
                                    autocomplete="off">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Zoek</button>
                        </form>
                        <br>

                        @if ($bands->isNotEmpty())
                            @foreach ($bands as $band)
                                <div class="row my-2">
                                    <div class="col-md d-flex align-items-center">
                                        <img class="searchImg" src={{ $band->imgid }} alt="">
                                        <h3 class="ps-3">{{ $band->name }}</h3>
                                        <h3 class="p-3">|</h3>
                                        <p class="mb-2">{{ $band->desc }}</p>
                                        <a class="btn btn-primary ms-auto" href="{{ route('band.show', $band->id) }}">Bezoek</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Geen bands gevonden.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
