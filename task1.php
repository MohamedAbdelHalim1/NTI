<?php

$unitConsumed = 120.00;

if($unitConsumed <= 50.00){
    $bill = $unitConsumed * 3.50;
   echo $bill . "LE";
}
elseif($unitConsumed > 50.00 and  $unitConsumed <= 150.00){
    $bill = $unitConsumed * 4.00;
    echo $bill . "LE";
}
else{
    $bill = $unitConsumed * 6.50;
   echo $bill . "LE";
}

 ?>