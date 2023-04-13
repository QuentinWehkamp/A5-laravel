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


                <div class="epk">
                    <div class="row my-5">
                        <div class="col-5">
                            <img class="object-fit border rounded" src="http://placehold.it/280" alt="">
                        </div>
                        <div class="col">
                            <div class="col">
                                <h1>Name</h1>
                            </div>
                            <div class="col">
                                <h3>Date created</h3>
                            </div>
                            <div class="col">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut, quia libero reprehenderit
                                    numquam adipisci velit veritatis officiis deleniti. Explicabo maxime atque quos
                                    asperiores molestias laboriosam. Non soluta nulla laborum ab? Doloribus sint quasi ex
                                    harum voluptates nesciunt fugiat dolor exercitationem.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <img class="rounded" src="http://placehold.it/180" alt="">
                        </div>
                        <div class="col">
                            <img class="rounded" src="http://placehold.it/180" alt="">
                        </div>
                        <div class="col">
                            <img class="rounded" src="http://placehold.it/180" alt="">
                        </div>
                        <div class="col">
                            <img class="rounded" src="http://placehold.it/180" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
