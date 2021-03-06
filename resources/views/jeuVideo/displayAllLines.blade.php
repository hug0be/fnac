@extends('base')

@section('css')
    <link rel="stylesheet" href="{{ asset("css/sideBar/sideBar-home.css") }}">
    <link rel="stylesheet" href="{{ asset("css/content/content-home.css") }}">
@endsection

@section('content')
<div class="container_all_game_line margin_top_content" >

    @include('layout.menu')
    <div class="container_all_game_line_content">
        <x-validation-message/>
        @foreach ($videoGames as $videoGame)
            @include('jeuVideo.displayLine')
        @endforeach
    </div>

</div>

@endsection