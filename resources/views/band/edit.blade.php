<?php
$decode = json_decode($band->ytlinks);
$yt0 = $decode->yt0;
$yt1 = $decode->yt1;
$yt2 = $decode->yt2;
if(isset($decode->yt3)){
    $yt3 = $decode->yt3;
}
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('edit EPK') }}
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">

                            <label>Whoops!</label> There were some problems with your input.<br><br>

                            <ul>

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>
                    @endif


                    <div class="container w-75 mt-3">
                        <form action="{{route('band.update', $band->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group position-relative mt-4 start-50 translate-middle text-center">
                                <label for="name" class="">Band Naam:</label><br>
                                <input class="form-control w-50 mx-auto" id="name" type="text" name="name"
                                    class="form-control" placeholder="Name" value="{{$band->name}}">
                            </div>

                            <div class="form-group position-relative mt-2 start-50 translate-middle text-center">
                                <label for="logo" class="">Band
                                    logo:</label><br>
                                <input class="form-control position-relative mx-auto w-50" type="file" name="logo"
                                    id="logo" accept="image">
                                {{-- file input gaat hier --}}
                            </div>

                            <div class="row form-group position-relative text-center">
                                <div class="col">
                                    <label for="bio">Bio:</label><br>
                                    <textarea class="form-control" name="bio" id="bio" cols="30" rows="5">{{$band->bio}}</textarea>
                                </div>
                                <div class="col">
                                    <label for="desc">Beschrijving:</label><br>
                                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="5">{{$band->desc}}</textarea>
                                </div>
                            </div>

                            <div class="form-group position-relative text-center mt-4 px-2">
                                <label for="yt-links">Youtube Links:</label>
                                <div class="px-1" id="yt-links">
                                    <div class="row gap-3 mb-2">
                                        <input class="form-control col" required name="yt-1" type="text" id="yt-1" value="{{$yt0}}">
                                        <input class="form-control col" required name="yt-2" type="text" id="yt-2" value="{{$yt1}}">
                                    </div>
                                    <div class="row gap-3">
                                        <input class="form-control col" required name="yt-3" type="text" id="yt-3" value="{{$yt2}}">
                                        <input class="form-control col" name="yt-4" type="text" id="yt-4"
                                        @if(isset($yt3))
                                            value="{{$yt3}}"
                                        @endif
                                        >
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative form-group row text-center mt-3 pb-3">
                                <div class="col">
                                    <label for="bgColour" class="">Achtergrondkleur:</label><br>
                                    <input class="form-control form-control-color mx-auto" type="color" value="{{$band->bgcolour}}" name="bgColour" id="bgColour">
                                </div>
                                <div class="col">
                                    <label for="txtColour">Tekstkleur</label><br>
                                    <input class="form-control form-control-color mx-auto" type="color" value="{{$band->txtcolour}}" name="txtColour" id="txtColour">
                                </div>
                            </div>
                    </div>

                    <div class="pb-3 col-xs-12 col-sm-12 col-md-12 text-center">
                        <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                    </form>

                @endsection
