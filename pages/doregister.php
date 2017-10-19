<?php

   session_start();
   require_once "../db/model/user.class.php";

   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $confirm_password = $_POST['confirm_password'];

   $user = new User();
   $user->username = $username;
   $user->email = $email;
   $user->password = $password;

   if ($password != $confirm_password){
      echo "password not matched";
   } else {
      $u = User::register($user);
      if (!$u){
         echo "wrong email or password";
      } else {
          $u = User::getCurrentUser($email);
          var_dump($u);
          $_SESSION['uid'] = $u->uid;
          $_SESSION['user'] = $u->email;
          $_SESSION['username'] = $u->username;
         header('location:myproduct.php');
      }
   }

 ?>
