<?php
    function displayAcceuil(){
        return '<h1>Bienvenu dans la page d\'acceuil</h1>';
    }
    function displayContact(){
        return '<h1>Bienvenu dans la page de contact</h1>';
    }

    function displayProduit(){
        global $model;
        $dataProduct = $model->getProducts();
        $result = '<h1>Bienvenu dans la page de produit</h1>';
        foreach ($dataProduct as $key => $value) {
            $result.= '<div class="card" style="width: 18rem; display:inline-block;">
            <img class="card-img-top" src="'.SP.BASE_URL.SP."src".SP."images".SP."produits".SP.$value["image"].'" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">'.$value["name"].'</h5>
              <p class="card-text">'.$value["description"].'</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>';
        }
        
        
        
        return $result;
    }
?>