<?php 
    require "include.php";
    //print_r ("Fichier index");
    echo  "<br>";
    $url = trim($_SERVER['PATH_INFO'],'/');
    $url = explode('/', $url);
    //print_r ($url);
    $route = array("acceuil", "contact", "produit");

    //1er élément du tableau qui est l'acton demandée par l'utilisateur
    $action = $url[0];
    //echo $action;
    echo  "<br>";
    

    // controller va tester si l'élément est dans les chemins des fichiers dossiers etc du site
    if(!in_array($action, $route)){
        echo 'error mon copain';
        $title = "Page Error";
        $content = "URL Introuvable";
    }

    else{
        //echo "Bienvenu dans l'action ".$action." !";
        $function = "display".ucwords($action);
        //echo $function;
        $title = "Page ".$action;
        $content = $function();
        //echo $content;
        echo "tout fonctionne mon copain";
    }

    require VIEWS.SP."templates".SP."default.php";
?>