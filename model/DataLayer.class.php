<?php

class DataLayer{
    private $connexion;
    function __construct(){
        try {
            $this->connexion = new PDO("mysql:host=".HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            echo "connexion à la base de données réussi";
        } catch (PDOException $th) {
            echo $th ->getMessage();
        }
    }
//Ajouter des acheteurs dans la base de donnée
    function createCustomers($pseudo, $email, $password){
        //echo " creation customers 1 ";
        $sql = "INSERT INTO customers (pseudo, email, password) VALUES(:pseudo,:email,:password)";
        try {
            //echo " creation dans le try 2 ";
            $result = $this->connexion->prepare($sql);
            //echo " preparation 3 ";
            $result_yes = $result->execute(array(

                ':pseudo' => $pseudo,
                ':email' => $email,
                ':password' => sha1($password)
            ));

            //echo " var";

            if($result_yes){
                echo TRUE;
            }else{
                echo FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
            echo " PDO EXCEPTION";
            
        }

        
    }
//Valide la connexion au compte
    function authentifier($email, $password){
        try {
            $sql ="SELECT * FROM customers WHERE email = :email";
            $result = $this->connexion->prepare($sql);
            $result->execute(array(':email'=>$email));
            $data = $result->fetch(PDO::FETCH_ASSOC);
            if ($data && ($data['password'] == sha1($password))){
                unset($data['password']);
                return $data;
                
            }else{
                return FALSE;
            }
        
        } catch (PDOException $th) {
            return NULL;
        }
    }
//Identifier une commande
    function createOrder($idCustomers, $idProduct, $quantity, $price){
        $sql = "INSERT INTO `orders`(`id_customers`, `id_product`, `quantity`, `price`, `ordered-at`, `orderscol`) VALUES
        (:id_customers, :id_product, :quantity, :price)";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(array(
                ':id_customers' => $idCustomers,
                ':id_product' => $idProduct,
                ':quantity' => $quantity,
                ':price' => $price
            ));
    
            if($var){
                return TRUE;
            }else{
                return FALSE;
            }

        } catch (PDOException $th) {
            return NULL;
        }



    }
//Mettre à jour des données avec UPDATE 
    function updateInfosCustomer($newInfos){
        $sql = "UPDATE `customers` SET ";
        try {
            foreach ($newInfos as $key => $value) {
                $sql.="$key = '$value' ,";
            }
            $sql = substr($sql, 0, -1);
            $sql .= "WHERE id = :id";
            $result = $this->connexion->prepare($sql);
            $var = $result ->execute(array('id'=>$newInfos['id']));
            echo "isgood";
            if($var){
                return true;
                echo "istrue";
            }else{
                return false;
            }

        } catch (PDOException $th) {
            return NULL;
        }
    }
//Fonction qui permet de récupérer les catégories
    function getCategory(){
        $sql = "SELECT * FROM category";
        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            echo " getCategory ";
            if($data){
                echo " getTrue ";
                return $data;
                
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            echo "CATCH";
            return NULL;
            
        }
    }
//Fonction qui permet de récupérer les catégories
    function getProducts($limit = NULL){
        $sql = "SELECT * FROM product ";
        try {
            if(!is_null($limit)){
                $sql .= 'LIMIT '.$limit;
            }
            //var_dump($sql); exit();
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            echo " get product ";
            if($data){
                echo " getTrue ";
                return $data;
                
            }else{
                return FALSE;
            }
        } catch (PDOException $th) {
            echo "CATCH";
            return NULL;
            
        }
    }
}

?>