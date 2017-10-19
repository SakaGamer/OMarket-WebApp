<?php

   require_once 'header.php';
   require_once '../db/model/user.class.php';

   // session_start();
   if (!isset($_SESSION['user']) ){
      header('location:login.php');
   } 

 ?>

         <link rel="stylesheet" href="profile.css" type="text/css">
         <!-- body -->
         <div class="body">

            <!-- profile image -->
            <div class="pf">
            </div>
            <!-- info -->
            <div class="name">
               <?php
                  echo "<div>Name: " .$username ."</div>";
                  echo "<div>Email: " .$email ."</div>";
                  echo "<a href='logout.php'>logout</a>";
                ?>
            </div>

         </div>
