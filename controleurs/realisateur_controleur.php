<?php

require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('vues');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

require_once("modeles/realisateur_modeles.php");

   
    
    function realList() {
        global $twig, $base_url;
        $realisateurs = bdd_realList();
        // var_dump($realisateurs);
        $template = $twig->load('realisateur.twig');
        echo $template->render(array('realisateurs' => $realisateurs, "base_url" => $base_url));
    }

    function realDetail() {
        global  $twig, $id, $base_url;
        $realdetailss = bdd_realDetail();
        
        $template = $twig->load('realisateur.twig');
        for ($i = 0; $i < 10; $i++) {
            if ($id === $i) {
                $realdetails = bdd_realDetail($i);
            } elseif ($id < 1 || $id > 9) {
                $realdetails = bdd_realDetail(1);
              
              
            }
        }
        echo $template->render(array('realdetails' => $realdetails, "base_url" => $base_url));

    }
    
switch ($action) {
    case 'list':
        realList();
        break;

    case 'detail':
        realDetail();
        break;
    
    default:
        realList();
        break;
}
