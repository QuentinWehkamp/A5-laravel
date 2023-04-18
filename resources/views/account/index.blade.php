@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mijn gegevens') }}</div>

                    <div class="card-body account-index">
                        <table>
                            <tr>
                                <td>ID:</td>
                                <td>{{ Auth::user()->id }}</td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="{{ route('account.edit', Auth::user()->id) }}">Bewerk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mijn EPK\'s') }}</div>

                    <div class="card-body">
                        @foreach ($bands as $band)
                            <a href={{ route('band.show', $band->id) }}>{{ $band->name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
