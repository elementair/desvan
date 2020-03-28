<?php

class Products{

    public $objProd;
    
    public function __construct() { 

        require 'database.php';
        $this->objProd = new Database();
        
    }
    

    public function show_productos(){

        $sth = $this->objProd->prepare('SELECT * FROM salidas');
        
        $sth->execute();
        
        $data = $sth->fetchAll();
        
        return $data;
        
    }
    
    
    public function edit_producto(){

        $this->objProd->exec('set names utf8');
        
        $sth = $this->objProd->prepare('UPDATE salidas as P JOIN entradas as B ON P.sku=B.SKU SET P.stock=B.Existencia, P.regular_price=B.PrecioNormal');

        if( $sth->execute()){

            $sth = $this->objProd->prepare('TRUNCATE TABLE entradas');
            $sth->execute();

            return "ok";

        }else{

            return "error";

        }

        $sth->close();
        $sth = null;

        header('location: ' . URL . 'admin/index.php');
        
    }
    
    


}

