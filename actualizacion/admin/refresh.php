<?php
//llamar nuestra constante URL
require '../util/constants.php';
//controlamos que se haya inciado sesion
require '../class/sessions.php';
$objSes = new Sessions();
$objSes->init();
$profile = $objSes->get('profi');

if((!isset($profile))&&($profile != 'Admin')){
    header('location: ' . URL);
}

if(isset($_POST['actualizar'])){
    //llamar la clase books
    require '../class/products.php';
    $objProducts = new Products();
    $file = $objProducts->edit_producto();
    if ($file=="ok") {
        $f = fopen('php://memory', 'w');

        if($f)

        {

            $file2=$objProducts->show_productos();
            if (count($file2) > 0) 
            { 

                $delimiter = ",";
                $filename = "productos" . date('Y-m-d') . ".csv";            
                
                $fields = array('ID', 'post_title', 'post_parent', 'sku', 'stock', 'regular_price');
                fputcsv($f, $fields, $delimiter);

                foreach ($file2 as $key => $value) {
                   $lineData = array($value['ID'], $value['post_title'], $value['post_parent'], $value['sku'], $value['stock'], $value['regular_price']);
                   fputcsv($f, $lineData, $delimiter);
               }

                // while($fed = $file2->fetch_assoc()){                    
                //     $lineData = array($value['ID'], $value['post_name'], $value['sku'],$value['stock'], $value['regular_price']);
                //     fputcsv($f, $lineData, $delimiter);
                // }

               fseek($f, 0);

               header('Content-Type: text/csv');
               header('Content-Disposition: attachment; filename="' . $filename . '";');

               fpassthru($f);
           }
       } 
       exit;
       fclose($f); 
   }

}else{
    header('location: ' . URL .'admin/index.php');
}

