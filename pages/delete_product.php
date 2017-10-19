<?php

   require_once 'header.php';
   require_once '../db/model/product.class.php';

   // product id
   if (isset($_GET['pid'])){
        $pid = $_GET['pid'];
   }
   Product::deleteProduct($pid, $uid);
   header('location:myproduct.php');

 ?>
