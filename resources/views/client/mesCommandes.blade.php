@extends('base')


@section('css')
    <link rel="stylesheet" href="{{ asset("css/sideBar/sideBar-videoGame-detail.css") }}">
    <link rel="stylesheet" href="{{ asset("css/serviceClient/commandeVeille.css") }}">

@endsection

@section('header')
    @include('layout.header-videoGame-detail')
@endsection

@section('content')

    @include('layout.menu')

    <div class="container_all_commande margin_top_content">

        <h1 class="">Mes commandes:</h1>

        <div class="container_all_commande_content">
            @include('commande.displayAll')
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset("js/sideBar-toggle/sideBar-videoGame-detail.js") }}"></script>
    <script src="{{ asset("js/content/content-videoGame-detail.js") }}"></script>
@endsection