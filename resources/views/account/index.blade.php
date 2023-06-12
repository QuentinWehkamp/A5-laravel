<?php

?>

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
                        @if (Auth::user()->bands)
                                @foreach (Auth::user()->bands as $band)
                                    {{-- <a href="{{ route('band.show', $band->id) }}">{{ $band->name }}</a><br> --}}
                                    <div class="col-md d-flex align-items-center">
                                        <img class="userImg" src={{ $band->imgid }} alt="">
                                        <h3 class="ps-3">{{ $band->name }}</h3>
                                        {{-- <h3 class="p-3">|</h3> --}}
                                        {{-- <p class="mb-2">{{ $band->desc }}</p> --}}
                                        <a class="btn btn-primary ms-auto" href="{{ route('band.show', $band->id) }}">Bezoek</a>
                                    </div>
                                @endforeach
                        @else
                            <p>No bands found for this user.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
