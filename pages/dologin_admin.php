<?php

   require_once "../db/model/admin.class.php";
   session_start();

   $email = $_POST['email'];
   $password = $_POST['password'];

   $admin = Admin::login($email, $password);

   if ($admin){
      $_SESSION['uid'] = $admin->uid;
       $_SESSION['admin'] = $admin->email;
      $_SESSION['adminname'] = $admin->adminname;
      echo "logged in";
      header('location:dashboard.php');
   } else {
      //header('location:login.php');
      echo "wrong email or password";
   }

 ?>
