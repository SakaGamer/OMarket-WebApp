<?php

   require_once "../db/model/user.class.php";
   session_start();

   $email = $_POST['email'];
   $password = $_POST['password'];

   $user = User::login($email, $password);

   if ($user){
      $_SESSION['uid'] = $user->uid;
      $_SESSION['username'] = $user->username;
      $_SESSION['user'] = $user->email;
      echo "logged in";
      header('location:myproduct.php');
   } else {
      //header('location:login.php');
      echo "wrong email or password";
   }

 ?>
