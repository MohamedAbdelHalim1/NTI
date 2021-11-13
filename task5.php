<?php

error_reporting(0);




$API_URL = file_get_contents('http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz');



 $jsonArray = json_decode($API_URL , true);  //return associative array
 foreach ($jsonArray as $data) {
         foreach ($data as $key=>$value1) {
             if(is_array($value1)){
                 foreach ($value1 as $k=>$value2) {
                        $file = fopen('product.txt', 'a') or die("cannot open");
                        if ($k == "products_id" || $k == "products_name" || $k == "products_description" || $k == "products_quantity " || $k == "products_model" || $k == "products_image" || $k == "products_date_added " ) {
                            fwrite($file ,$k . " : ");
                            fwrite($file ,$value2 . " \n");
                        }
                            
                        }
                     
                        
                 }
             }
         }
     
         fclose($file);


 echo "Saved Successfully in product.txt from API URL";

?>