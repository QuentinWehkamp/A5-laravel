@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Bewerk Wachtwoord') }}</div>
                    <form method="POST" action="{{ route('change-password', Auth::user()->id) }}">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Niew Wachtwoord</label>
                                <input name="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="Niew Wachtwoord">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Bevestig Niew Wachtwoord</label>
                                <input name="new_password_confirmation" type="password" class="form-control"
                                    id="confirmNewPasswordInput" placeholder="Bevestig Niew Wachtwoord">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-success" href="{{ URL::previous() }}">Terug</a>
                            <button class="btn btn-success">Opslaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
