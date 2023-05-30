<?php
$obj = json_decode($band->ytlinks);

$newyt0 = explode('=', $obj->yt0);
$newyt1 = explode('=', $obj->yt1);
$newyt2 = explode('=', $obj->yt2);

if (isset($obj->yt3)) {
    $newyt3 = explode('=', $obj->yt3);
}

use Illuminate\Support\Facades\Auth;
Auth::check();
$id = Auth::id();
if (isset($id)) {
    $admin = json_decode($band->adminid);
}
?>
@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: {{ $band->bgcolour }}; color: {{ $band->txtcolour }}">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (isset($id) && in_array($id, (array) $admin))
                        <div class="card-header">
                            <div class="text-end">
                                <a class="btn btn-outline-dark me-1" href="{{ route('band.edit', $band->id) }}">Edit</a>
                                <a class="btn btn-danger btn-outline-dark" href="{{ route('band.destroy', $band->id) }}">Delete</a>
                            </div>
                        </div>
                    @endif
                    <div class="epk d-flex flex-row flex-wrap overflow-auto position-relative py-3 px-3">

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
                                    frameborder="0"
                                    allow=""
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                <iframe class="rounded" width="280" height="157"
                                    src="https://www.youtube.com/embed/{{ $newyt1[1] }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                <iframe class="rounded" width="280" height="157"
                                    src="https://www.youtube.com/embed/{{ $newyt2[1] }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="">
                                @if (isset($newyt3))
                                    <iframe class="rounded" width="280" height="157"
                                        src="https://www.youtube.com/embed/{{ $newyt3[1] }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen>
                                    </iframe>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
