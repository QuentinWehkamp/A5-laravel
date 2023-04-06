@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bewerk mijn gegevens') }}</div>

                    <div class="card-body account-edit">
                        <form method="POST" action="{{ route('account.update', Auth::user()->id) }}">
                            @method('PUT')
                            @csrf
                            <div>
                                <label for="">Naam:</label>
                                <input type="text" name="wachtwoord" value="{{ Auth::user()->password }}" autocomplete="off">
                                @error('wachtwoord')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
