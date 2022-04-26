<?php 
require 'database_connection.php';
require 'login_check.php';  
error_reporting(0);


$low = $high =  $mobile_brand = $mobile_color = $b_low = $b_high =$mobile_RAM = $mobile_STORAGE  = "";
 if (isset($_POST["submit"])) {

  /*  brand */
  $mobile_brand = $_POST["brand"];

/* price */

if(isset($_POST['price'])) {
  if($_POST['price']=='price1'){
  $low = 2000; $high = 4999;
}
if($_POST['price']=='price2'){
  $low = 5000; $high = 9999;
}
if($_POST['price']=='price3'){
  $low = 10000; $high = 14999;
} 
if($_POST['price']=='price4'){
  $low = 15000;
  $high = 1000000; 
} 
}

/* color */

$mobile_color = $_POST["color"];


/* battery */

if(isset($_POST['battery'])) {
  if($_POST['battery']=='b1'){
  $b_low = 2000; $b_high = 2999;
}
if($_POST['battery']=='b2'){
  $b_low = 3000; $b_high = 3999;
}
if($_POST['battery']=='b3'){
  $b_low = 4000; $b_high = 4999;
} 
if($_POST['battery']=='b4'){
  $b_low = 5000; 
  $b_high = 1000000;
} 
}

/* RAM */
if(isset($_POST['ram'])){
  if($_POST['ram']=='r1'){
    $mobile_RAM = 4;
  }
  if($_POST['ram']=='r2'){
    $mobile_RAM = 8;
  }
  if($_POST['ram']=='r3'){
    $mobile_RAM = 16;
  }
}

// $mobile_RAM = $_POST["ram"];


/* storage */

if(isset($_POST['storage'])){
  if($_POST['storage']=='s1'){
    $mobile_STORAGE = 32;
  }
  if($_POST['storage']=='s2'){
    $mobile_STORAGE = 64;
  }
  if($_POST['storage']=='s3'){
    $mobile_STORAGE = 128;
  }
}

// $mobile_STORAGE = $_POST["storage"];




/* select all */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN $low AND $high AND color = '$mobile_color' AND battery BETWEEN $b_low AND $b_high AND ram = $mobile_RAM AND storage = $mobile_STORAGE";
}

/* select all except storage */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN $low AND $high AND color = '$mobile_color' AND battery BETWEEN $b_low AND $b_high AND ram = $mobile_RAM";
}

/* select all except ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all except battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except storage and ram */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* select all except storage and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL ) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND ram = '$mobile_RAM'";
}

/* select all except storage and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM'";
}

/* select all except storage and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM'";
}

/* select all except storage and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM'";
}

/* select all except ram and battery */

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except storage and ram and battery */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL ) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color'";
}

/* select all except storage and ram and color */ 

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* select all except storage and ram and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* select all except storage and ram and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* select all ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and battery and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and battery and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color' AND storage = '$mobile_STORAGE'";
}
 
/* select all except battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except battery and color and storage */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high' AND ram = '$mobile_RAM'";
}

/* select all except battery and color and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price and ram */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price and storage */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM'";
}

/* select all except storage and ram and battery and color */

if (isset($_POST["brand"]) && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND price BETWEEN '$low' AND '$high'";
}

/* select all except storage and ram and battery and price */ 

if (isset($_POST["brand"]) && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND color = '$mobile_color'";
}

/* select all except storage and ram and battery and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND color = '$mobile_color'";
}

/* select all except ram and battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND storage = '$mobile_STORAGE'";
}

/* select all except ram and battery and color and brand */

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN '$low' AND '$high' AND storage = '$mobile_STORAGE'";
}

/* select all except battery and color and price and storage */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand' AND ram = '$mobile_RAM'";
}

/* select all except battery and color and price and brand */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND ram = '$mobile_RAM' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price and brand and ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND battery BETWEEN '$b_low' AND '$b_high' AND storage = '$mobile_STORAGE'";
}

/* select all except color and price and brand and storage */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND battery BETWEEN '$b_low' AND '$b_high' AND ram = '$mobile_RAM'";
}

/* select all except storage and ram and battery and color and price */

if (isset($_POST["brand"]) && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND brand = '$mobile_brand'";
}

/* select all except storage and ram and battery and color and brand */ 

if ($_POST["brand"]==NULL && isset($_POST["price"]) && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND price BETWEEN $low AND $high";
}

/* select all except ram and battery and color and price and brand */ 

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && isset($_POST["storage"])) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND storage = '$mobile_STORAGE'";
}

/* select all except brand and storage and price and ram and battery */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && isset($_POST["color"]) && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND color = '$mobile_color'";
}

/* select all except brand and color and storage and price and battery*/

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && isset($_POST["ram"]) && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND ram = '$mobile_RAM'";
}

/* select all except brand and color and storage and price and ram */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && isset($_POST["battery"]) && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1 AND battery BETWEEN '$b_low' AND '$b_high'";
}

/* Unselect all */

if ($_POST["brand"]==NULL && $_POST["price"]==NULL && $_POST["color"]==NULL && $_POST["battery"]==NULL && $_POST["ram"]==NULL && $_POST["storage"]==NULL) {
  $sql = "SELECT * FROM electronic_products INNER JOIN electronic_products_stores ON e_id = electronics_products_id
  INNER JOIN stores ON s_id = store_id WHERE sub_id = 1";
}

$_SESSION['sql']=$sql;
header("location: mobile_filter_results.php");



 }


?>


  <!doctype html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <title>Buy Guide</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon"  href="../img/magnifying_glass.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="../style/style.css">
 <link rel="stylesheet" href="../style/caregories.css">
 <link rel="stylesheet" href="../style/user.css">
 <link rel="stylesheet" href="../style/theme.css">
 <link rel="stylesheet" href="../style/storepage.css">
 <link rel="stylesheet" href="../style/loadingpage.css">
 <link rel="stylecheet" href="../fontawesome-free-6.1.1-web/css/all.css">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Ubuntu:wght@300&display=swap" rel="stylesheet">





</head>
<body>
  <!-- <div id="preloader">

  </div> -->
    <nav class="navbar navbar-dark  navbar-expand-lg" id="nav">
        <div class="container-fluid">
        <div class="col-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                     Electronic Devices
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">test1</a></li>

                    </ul>
                    <li class="nav-item">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #e79115;"> 
                       Clothes
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="#">test2</a></li>
                 
                 
                 
                </ul>
              </div>
        </div>
          <div class="col-1">
          <a class="navbar-brand" href="categories.html">
            <img src="../img/logo.png" alt="" width="60" height="60" id="logo" >
            
          </a>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
         
       
         
            <div class="container user-cont">
              <div class="dropdown">
                  <div class="profile"> <img class="dropbtn" src="../img/user.png"><span class="username"><?php echo $_SESSION['user']['firstname']; ?></span>
                      <div class="dropdown-content">
                          <ul class="user-li">
                            <li><i class='bx bx-cog'></i><a href="./saved.html"><span>Saved</span></a></li>

                              <li><div>
                                <input type="checkbox" class="checkbox" id="chk" />
                                <label class="label" for="chk">
                                  <div class="ball"></div> 
                                </label>
                              </div>
                            <span>&nbsp; &nbsp; Dark mode</span></li>
                              <li><i class='bx bx-cog'></i><span><a href="logout.php">Logout</a></span></li>
                     
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          
              
        </div>
        
     
        </div>
      </nav>
     
      <div class="container">
        <div class="row">
          <div class="col-2 ">
            <a  class="btn btn-outline-warning" href="./categories.html"> <i class="fa-solid fa-arrow-left"></i>Back to categories</a>
          </div>
          
        </div>
        <br>

        <div class="row filterdiv">
          <div class="col-1 "></div>
          <div class="col-4 ">
            <p class="about">
<br>
             Choose whats is you need and  we will recommend best products for you
             

  
  
          </p>
          <div class="alert alert-warning" role="alert">
           Note: if you want to see all products click on show directly 
          </div>
          </div>
          <div class="col-2 "></div>



          <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="col-4 ">
              <h1 class="heading"></h1>


              <div class="options">
          
                      <div class="box border-bottom">
                        <div class="box-label text-uppercase d-flex align-items-center">Brand </div>
                        <div class="inner-box2" class="collapse mt-2 mr-1">
                            <div class="my-1"> <label class="tick">iphone <input type="radio" name="brand" value="apple"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">oppo <input type="radio" name="brand" value="oppo"> <span class="check"></span> </label> </div>
                            <div class="my-1"> <label class="tick">samsung <input type="radio" name="brand" value="samsung"> <span class="check"></span> </label> </div> 
  
                        </div>
                    </div>
                    <div class="box border-bottom">
                      <div class="box-label text-uppercase d-flex align-items-center">Price  </div>
                      <div class="inner-box2" class="collapse mt-2 mr-1">
                      <div class="my-1"> <label class="tick">2000-4999 <input type="radio" name="price" value="price1"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">5000-9999 <input type="radio" name="price" value="price2"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">10000-14999 <input type="radio" name="price" value="price3"> <span class="check"></span> </label> </div>
                          <div class="my-1"> <label class="tick">above 15000 <input type="radio" name="price" value="price4"> <span class="check"></span> </label> </div>
    
                      </div>
                  </div>
                              

                          
                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Color </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                    <div class="my-1"> <label class="tick">black <input type="radio" name="color" value="black"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">white <input type="radio" name="color" value="white"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">blue <input type="radio" name="color" value="blue"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">red <input type="radio" name="color" value="red"> <span class="check"></span> </label> </div>
  
                    </div>
                    
                    
                </div>


                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Battery </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">2000 up to 2999 AMP <input type="radio" name="battery" value="b1"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">3000 up to 3999 AMP <input type="radio" name="battery" value="b2"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">4000 up to 4999 AMP <input type="radio" name="battery" value="b3"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">above 5000 AMP <input type="radio" name="battery" value="b4"> <span class="check"></span> </label> </div>
  
                    </div>

                </div>


                <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">RAM </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">4 <input type="radio" name="ram" value="r1"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">8 <input type="radio" name="ram" value="r2" > <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">16 <input type="radio" name="ram" value="r3"> <span class="check"></span> </label> </div>  
                    </div>
                  </div>



                  <div class="box border-bottom">
                    <div class="box-label text-uppercase d-flex align-items-center">Storage </div>
                    <div class="inner-box2" class="collapse mt-2 mr-1">
                        <div class="my-1"> <label class="tick">32 <input type="radio" name="storage" value="s1"> <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">64 <input type="radio" name="storage" value="s2" > <span class="check"></span> </label> </div>
                        <div class="my-1"> <label class="tick">128 <input type="radio" name="storage" value="s3"> <span class="check"></span> </label> </div>  
                    </div>
                  </div>  








                <div class="box border-bottom">
                  
                <label for="Select" class="form-label">Choose you city</label>
                <select id="Select" class="form-select">
                  <option>...</option>
                  <option>Giza</option>
                  <option> Alex</option>
                </select>
                  </div>

       
  
  
      
                
                  
                    
                  
              </div>
              <button type="submit" class="btn btn-outline-warning" name="submit" value="Show">show</button>
          </div> 
         

</div>
</div>

</form>
    
      <footer class="page-footer font-small  "  id="footer" >
  
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 " >© 2022 Copyright:
          <a href="categories.html"> BUYGUIDE.Com</a>
        </div>
        <!-- Copyright -->
      
      </footer>
    </div>
    </div>
      <script src="../bootstrap/js/bootstrap.min.js"></script>
      <script src="../fontawesome-free-6.1.1-web/js/all.js"></script>  
      <script src="../JS/script.js"></script>
      <script src="../JS/theme.js"></script>
  </body>
  </html>