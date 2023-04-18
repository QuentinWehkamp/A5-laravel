<?php 
$obj = json_decode($band->ytlinks);
$newyt0 = explode("=", $obj->yt0);
$newyt1 = explode("=", $obj->yt1);
$newyt2 = explode("=", $obj->yt2);
// $newyt3 = explode("=", $obj->yt3);

?>
@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: {{ $band->bgcolour }}; color: {{ $band->txtcolour }}">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="epk">
                    <div class="row my-5">
                        <div class="col-md-5">
                            <img class="object-fit border rounded bandImg" src={{ asset($band->imgid) }} alt="">
                        </div>
                        <div class="col-md">
                            <div class="col-md">
                                <h1>{{ $band->name }}</h1>
                            </div>
                            <div class="col-md">
                                <h3>{{ $band->created_at }}</h3>
                            </div>
                            <div class="col-md">
                                <p>{{ $band->bio }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <iframe width="280" height="157" src="https://www.youtube.com/embed/{{ $newyt0[1] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="col-md">
                            <iframe width="280" height="157" src="https://www.youtube.com/embed/{{ $newyt1[1] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="col-md">
                            <iframe width="280" height="157" src="https://www.youtube.com/embed/{{ $newyt2[1] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="col-md">
                            <iframe width="280" height="157" src="https://www.youtube.com/embed/{{ $newyt2[1] }}"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
