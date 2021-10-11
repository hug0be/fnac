

@extends('base')


@section('css')
    <link rel="stylesheet" href="{{ asset("css/sideBar/sideBar-videoGame-detail.css") }}">
    <link rel="stylesheet" href="{{ asset("css/content/content-videoGame-detail.css") }}">
@endsection


@section('header') 
    @include('layout.header-videoGame-detail')
@endsection


@section('content')

    {{-- <div class="menu_nav_sidebar">
        <h4 class="menu_nav_sidebar_title">TOUS LES RAYONS</h4>

        
            @foreach ($rayons as $rayon)
                <div class="menu_nav_sidebar_container_link">
                    <a href="{{route("searchByRayon", ['idRayon' => $rayon->ray_id]);}}" class="link_menu_nav_sidebar" >{{ $rayon->ray_nom }}</a>
                </div>
            @endforeach

        
    </div> --}}










    <div class="container_detail_game margin_top_content">
        

        
        <div class="menu_nav_sidebar">
            <div class="menu_nav_sidebar_content">
                
                <div class="menu_nav_sidebar_container_aisle">
                    <h4 class="menu_nav_sidebar_title">
                        <a href="{{ route('home') }}">
                            TOUS LES RAYONS
                        </a>
                    </h4>
            
                    
                        @foreach ($rayons as $rayon)
                            <div class="menu_nav_sidebar_container_link">
                                <a href="{{route("searchByRayon", ['idRayon' => $rayon->ray_id]);}}" class="link_menu_nav_sidebar" >{{ $rayon->ray_nom}}</a>
                            </div>
                        @endforeach
                </div>
        
                <div class="menu_nav_sidebar_container_console">
                    <h4 class="menu_nav_sidebar_title">
                        <a href="{{ route('home') }}">
                            TOUTES LES CONSOLES
                        </a>
                    </h4>
            
                    
                        @foreach ($consoles as $console)
                            <div class="menu_nav_sidebar_container_link">
                                <a href="{{route("searchByConsole", ['idConsole' => $console->con_id]);}}" class="link_menu_nav_sidebar" >{{ $console->con_nom}}</a>
                            </div>
                        @endforeach
                </div>
            </div>

    
            
        </div>








        <div class="container_detail_game_content ">

            <div class="container_first_second_section detail_game_content_padding">
                <div class="container_detail_game_content_title_info ">
                    <h1 class="container_detail_game_content_title_h1" > {{ $videoGame->jeu_nom }} </h1>
    
                    <div class="detail_game_content_info_container">
                        <p class="detail_game_content_info_container_txt" >Jeu <span>-</span></p>
                        <p class="detail_game_content_info_container_txt" > {{ $videoGame->console->con_nom }} <span>-</span> </p>
                        <p class="detail_game_content_info_container_txt" >Paru le  {{ $videoGame->jeu_dateparution->translatedFormat(' jS F Y') }} </p>
                        
                    </div>
    
                </div>
    
    
                <div class="container_detail_game_content_imgs_price">
    
                    <div class="container_detail_game_content_imgs">
    
                        <div class="container_column_small_imgs">
    
    
                            @foreach ($videoGame->photo as $photo)
    
                            <div class="container_small_img">
                                <img src="{{asset("Photos/".$photo->pho_url)}}" alt="" class="game_detail_small_img">
                            </div>
                        
    
                            @endforeach 
    
      
    
                        </div>
    
    
                        <div class="container_active_img">
    
                            @php
                                $displayFirstImage = false;
                            @endphp
    
    
                            @foreach ($videoGame->photo as $photo)
    
                                @if (!$displayFirstImage)
                        
                                
                                    <img src="{{asset("Photos/".$photo->pho_url)}}" alt="" class="game_detail_active_img">
     
                        
                                    @php $displayFirstImage = true; @endphp
                                @endif
                    
                            @endforeach

                            <div class="active_img_open">
                                <img src="{{ asset('/img/icon/icon-search.svg')}}" alt="" class="icon_active_img_open">
                            </div>
    
                        </div>
                    </div>
    
                    <div class="container_detail_game_content_price">
    
                        <div class="detail_game_price">
                            <div class="detail_game_pricee_first_value">
                                @php
                                    $game_line_price_first_value = substr($videoGame->jeu_prixttc, 0, 2);
                                @endphp
                
                                {{ $game_line_price_first_value }}
                            </div>
                
                
                            <div class="detail_game_price_second_value">
                                @php
                                    $game_line_price_second_value = substr($videoGame->jeu_prixttc, 3);
                                @endphp
                
                                €{{ $game_line_price_second_value }}
                            </div>
                        </div>
    
                        <div class="detail_game_stock">
    
                            @if ($videoGame->jeu_stock > 0)
                                <p class="game_line_in_stock" > <i class="fas fa-check-circle icon_game_line"></i> En stock </p>
                            @else
                                <p class="game_line_out_of_stock" > <i class="fas fa-times-circle icon_game_line"></i> Rupture de stock </p>
                            @endif
    
                        </div>
    
                        <div class="detail_game_cart">
                            <a href="#" class="detail_game_cart_link"> <i class="fas fa-shopping-bag"></i> Ajouter au panier </a>
                        </div>
    
                    </div>
    
                </div>
    
    
                <div class="container_detail_game_content_spec_descr">
    
                    <div class="container_detail_game_content_spec">
    
                        <div class="container_detail_game_content_spec_tab">
    
                            <div class="detail_game_spec">
                                <h5 class="detail_game_spec_title">Détails produits</h5>
                            </div>
    
    
                            <div class="detail_game_spec_line_infos">
                                <p class="spec_line_info_type">Plateforme</p>
                                <a href="#" class="spec_line_info_link"> {{ $videoGame->console->con_nom }} </a>
                            </div>
        
                            <div class="detail_game_spec_line_infos">
                                <p class="spec_line_info_type">Editeur</p>
                                <a href="#" class="spec_line_info_link"> {{ $videoGame->editeur->edi_nom }} </a>
                            </div>
        
                            <div class="detail_game_spec_line_infos">
                                <p class="spec_line_info_type">Date de parution</p>
                                <p class="spec_line_info_txt"> {{ $videoGame->jeu_dateparution->translatedFormat('F Y ') }} </p>
                            </div>
        
                            <div class="detail_game_spec_line_infos">
                                <p class="spec_line_info_type">Public légal</p>
                                <p class="spec_line_info_txt"> {{ $videoGame->jeu_publiclegal }} </p>
                            </div>
    
        
          
                        </div>
         
    
    
    
    
                    </div>
    
    
    
    
                    <div class="container_detail_game_content_descr">
                        
                        <div class="detail_game_descr">
    
                            <h4 class="detail_game_descr_title">Description</h4>
    
                            <p class="detail_game_descr_txt">
                                {{ $videoGame->jeu_description }}
                            </p>
    
                        </div>
    
                    </div>
                </div>
            </div>




            <div class="container_detail_game_content_notice ">

                <h4 class="container_detail_game_content_notice_title">
                    Avis Client
                </h4>

                <div class="container_detail_game_content_all_notice_card">

                    @foreach ($videoGame->avis as $aNotice)
                        @php
                            $surnameFirstLetter = substr( $aNotice->client->cli_nom, 0, 1)
                        @endphp

                        <div class="container_detail_game_content_notice_card">
                            <p class="notice_card_name">  {{ $aNotice->client->cli_prenom }} {{ $surnameFirstLetter }}. </p>
                            <p class="notice_card_date">Avis posté le {{ $aNotice->avi_date->translatedFormat('l jS F Y à H\hi') }}</p>
                            <p class="notice_card_title"> {{ $aNotice->avi_titre }} </p>
                            <p class="notice_card_descr"> {{ $aNotice->avi_detail }} </p>
                        </div>
                    @endforeach

  
                    
  

                    
                </div>
                
               
            </div>
          
        </div>





        <div class="container_lightbox_detail_game">
            
            <div class="lightbox_detail_game_content">
                <div class="lightbox_detail_game_close">
                    <div class="lightbox_detail_game_close_sub_container">

                    </div>
                </div>

                <img src="" alt="" class="lightbox_detail_game_img">
            </div>

        </div>


        {{-- <div class="container_detail_game_avis">
            <h1>Avis</h1>
            @foreach ($videoGame->avis as $avis)
            <div style="margin:10px; background-color: white">
                <p>Date : Le {{ $avis->avi_date->translatedFormat('l jS F Y à H\hi') }} </p>
                <p>Titre : {{ $avis->avi_titre }}</p>
                <p>Commentaire : {{ $avis->avi_detail }}</p>   
                <p>Auteur : {{ $avis->client->cli_nom }} {{ $avis->client->cli_prenom}} </p>
            </div>
            @endforeach
        </div> --}}



    </div>





    


@endsection



@section('js')
    <script src="{{ asset("js/sideBar-toggle/sideBar-videoGame-detail.js") }}"></script>
    <script src="{{ asset("js/content/content-videoGame-detail.js") }}"></script>
@endsection