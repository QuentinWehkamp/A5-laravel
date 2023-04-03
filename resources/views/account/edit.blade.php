@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mijn gegevens') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('account.update', Auth::user()->id) }}">
                            @method('put')
                            @csrf
                            <div>
                                <label for="">Naam</label>
                                <input type="text" name="naam" value="{{ Auth::user()->name }}">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
