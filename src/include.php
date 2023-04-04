<?php



    echo " 0 define ";
    define("SRC", dirname(__FILE__));
    define("ROOT", dirname(SRC));
    define("SP", DIRECTORY_SEPARATOR);
    define("CONFIG", ROOT.SP."config");
    define("VIEWS", ROOT.SP."views");
    define("MODEL", ROOT.SP."model");
    define("BASE_URL", dirname(trim($_SERVER['REQUEST_URI'],'/')));
    echo " 1 define ";
    //print_r(array(VIEWS, MODEL)); exit();
    // Les fonctions appelées par le controlleur
    require CONFIG.SP."config.php";
    require MODEL.SP."DataLayer.class.php";

    $model = new DataLayer();
    //$var = $data -> createCustomers('daniele', 'daniele2003@gmail.com', 'daniele03');
    //die($var);
    //$auten = $data -> authentifier('daniele2003@gmail.com', 'daniele03');
    //print_r($auten); exit();
    //echo " écho dollarvar ";
    //echo $var;
    //$data->updateInfosCustomer(array('id'=>'3','pseudo'=>'jean','sexe'=>1, 'firstname'=>'DUPONT', 'email'=>'jean25@gmail.com'));
    //$category = $data->getCategory();
    //print_r($category); exit();
   
    //$products = $data->getProduct(3);
    //var_dump($products); exit();


    echo "pouletos";
    require "functions.php";
?>