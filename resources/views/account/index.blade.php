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

                    <div class="card-body">
                        <div>
                            id: {{ Auth::user()->id }}
                        </div>
                        <div>
                            Naam: {{ Auth::user()->name }}
                        </div>
                        <div>
                            Email: {{ Auth::user()->email }}
                        </div>
                        <div>
                            <a href="{{ route('account.edit', Auth::user()->id) }}">Edit</a>
                        </div>
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
                        <div>naam + link 1</div>
                        <div>naam + link 2</div>
                        <div>naam + link 3</div>
                        <div>naam + link 4</div>
                        <div>naam + link 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
