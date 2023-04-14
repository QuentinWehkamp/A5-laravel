
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('EPK maken') }}
                    </div>

    @if ($errors->any())
        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif



    <form action="{{ route('band.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="">

                <div class="form-group">

                    <strong class="">Band Naam:</strong><br>

                    <input class=" sm" type="text" name="name" class="form-control" placeholder="Name">

                </div>

                <div class="form-group">
                    <strong class="text-center">Band logo:</strong><br>
                    <input class="" type="file" name="logo" id="logo" accept="image">
                    {{-- file input gaat hier --}}
                </div>
                <div class="form-group">
                    <strong>Bio:</strong><br>

                    <textarea name="bio" id="bio" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <strong>Beschrijving:</strong><br>

                    <textarea name="desc" id="desc" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <strong>Youtube Links:</strong><br>
                    <input required name="yt-1" type="text" id="yt-1">
                    <input required name="yt-2" type="text" id="yt-2">
                    <input required name="yt-3" type="text" id="yt-3">
                    <input name="yt-4" type="text" id="yt-4">
                </div>
                <div class="form-group">
                    <strong>Achtergrondkleur:</strong><br>
                    <input type="color" value="#ffffff" name="bgColour" id="bgColour">
                </div>
                <div class="form-group">
                    <strong>Tekstkleur</strong><br>
                    <input type="color" name="txtColour" id="txtColour">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <input type="hidden" readonly id="adminid" name="adminid" value="{{ Auth::user()->id }}">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

    </form>

@endsection
