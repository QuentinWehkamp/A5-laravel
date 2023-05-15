@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bewerk mijn gegevens') }}</div>

                    <form method="POST" action="{{ route('account.update', Auth::user()->id) }}">
                        <div class="card-body">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="">Naam:</label>
                                <input class="form-control" type="text" name="naam" value="{{ Auth::user()->name }}"
                                    autocomplete="off">
                                @error('naam')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email:</label>
                                <input class="form-control" type="text" name="email" value="{{ Auth::user()->email }}"
                                    autocomplete="off">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success" href="{{ route('account.index') }}">Terug</a>
                            <button class="btn btn-success" type="submit">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
