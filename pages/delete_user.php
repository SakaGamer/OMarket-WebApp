<?php

   require_once 'header.php';
   require_once '../db/model/user.class.php';

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
   // user email
   if (isset($_GET['user'])){
        $email = $_GET['user'];
   }
    User::deleteUser($email);
    header('location:dashboard.php');
   
 ?>
