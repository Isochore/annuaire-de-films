<?php


$maxFilm = 12;



require_once("modeles/film_modeles.php");

       
    function filmList() {
        global $twig, $base_url, $tri;
        if ($tri === 0) {
            $films = bdd_filmList('DESC');
        } else if ($tri === 1) {
            $films = bdd_filmList('ASC');
        }
            
        echo $twig->render('film.twig', array('films' => $films, "base_url" => $base_url));

    }

    function filmDetail() {
        global $twig, $id, $base_url;
        $films = bdd_filmDetail();
       
            if ($id !=0) {
                $details = bdd_filmDetail($id);
            } elseif ($id < 1 || $id > $maxFilm) {
                $details = bdd_filmDetail(1);
            }
        
        echo $twig->render('film.twig', array('details' => $details, "base_url" => $base_url));
    }

    function filmDateAsc() {
        global $twig, $base_url;
        $films = bdd_filmDateAsc();
        echo $twig->render('film.twig',array('films' => $films, "base_url" => $base_url));
    }

    function filmDateDesc() {
        global $twig, $base_url;
        $films = bdd_filmDateDesc();
        echo $twig->render('film.twig',array('films' => $films, "base_url" => $base_url));
    }

    function filmGenre() {
        global $twig, $id, $base_url, $genres;
        $films = bdd_filmGenre();
        
            if ($id !=0) {
                $genres = bdd_filmGenre($id);
            } elseif ($id < 1 || $id > 17) {
                $genres = bdd_filmList();
            }
        
       
        echo $twig->render('film.twig',array('genres' => $genres, "base_url" => $base_url));
    }

    
switch ($action) {
    case 'list':
        filmList();
        break;

    case 'detail':
        filmDetail();
        break;
    
    case 'genre':
        // filmDateAsc();
        filmGenre();
        break;

    case '0':
        // filmDateDesc();
        break;

    default:
        filmList();
        break;
}