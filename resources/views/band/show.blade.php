<?php
$obj = json_decode($band->ytlinks);

if (str_contains('youtu.be', $obj->yt0)) {
    $newyt0 = explode('/', $obj->yt0);
} else {
    $newyt0 = explode('=', $obj->yt0);
}

if (str_contains('youtu.be', $obj->yt1)) {
    $newyt1 = explode('/', $obj->yt1);
} else {
    $newyt1 = explode('=', $obj->yt1);
}

if (str_contains('youtu.be', $obj->yt2)) {
    $newyt2 = explode('/', $obj->yt2);
} else {
    $newyt2 = explode('=', $obj->yt2);
}

if (isset($obj->yt3)) {
    if (str_contains('youtu.be', $obj->yt3)) {
        $newyt + ($i = explode('/', $obj->yt3));
    } else {
        $newyt[$i] = explode('=', $obj->yt3);
    }
    $newyt3 = explode('=', $obj->yt3);
}

var_dump($newyt0);
exit();

use Illuminate\Support\Facades\Auth;
Auth::check();
$user = Auth::user();
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (isset($user) && $user->bands->contains('id', $band->id))
                        <div class="card-header rounded-top">
                            <div class="text-end">
                                <form action="{{ route('band.destroy', $band->id) }}" method="post">
                                    <a class="btn btn-outline-dark me-1" href="{{ route('band.edit', $band->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-outline-dark" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="epk d-flex flex-row flex-wrap overflow-auto position-relative py-3 px-3 rounded-bottom"
                        style="background-color: {{ $band->bgcolour }}; color: {{ $band->txtcolour }}">

                        <div class="col-1 pt-1 me-5">
                            <img class="rounded bandImg" src={{ asset($band->imgid) }} alt="">
                        </div>
                        <div class="d-flex flex-column pt-3 col ms-5 text-wrap">
                            <div class="">
                                <h1>{{ $band->name }}</h1>
                            </div>
                            <div class="">
                                <p>{{ $band->desc }}</p>
                            </div>
                            <div class="">
                                <p>{{ $band->bio }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column pt-1">
                            <div class="">
                                <iframe class="rounded" width="280" height="157"
                                    src="https://www.youtube.com/embed/{{ $newyt0[1] }}" title="YouTube video player"
                                    frameborder="0" allow="" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                <iframe class="rounded" width="280" height="157"
                                    src="https://www.youtube.com/embed/{{ $newyt1[1] }}" title="YouTube video player"
                                    frameborder="0" allow="" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                <iframe class="rounded" width="280" height="157"
                                    src="https://www.youtube.com/embed/{{ $newyt2[1] }}" title="YouTube video player"
                                    frameborder="0" allow="" allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                @if (isset($newyt3))
                                    <iframe class="rounded" width="280" height="157"
                                        src="https://www.youtube.com/embed/{{ $newyt3[1] }}"
                                        title="YouTube video player" frameborder="0" allow="" allowfullscreen>
                                    </iframe>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
