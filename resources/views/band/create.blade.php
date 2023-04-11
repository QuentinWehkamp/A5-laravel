
@extends('band.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Add New EPK</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>

            </div>

        </div>

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



        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Name:</strong>

                    <input type="text" name="name" class="form-control" placeholder="Name">

                </div>

                <div class="form-group">
                    <strong>Band logo:</strong><br>
                    <input type="file" name="logo" id="logo" accept="image">
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
                    <input type="color" name="bg-colour" id="bg-colour">
                </div>
                <div class="form-group">
                    <strong>Textkleur</strong><br>
                    <input type="color" name="txt-colour" id="txt-colour">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>



    </form>

@endsection
