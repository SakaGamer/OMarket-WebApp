<?php

   require_once 'header.php';
   require_once '../db/model/user.class.php';
    require_once '../db/model/product.class.php';

   // session_start();
   if (!isset($_SESSION['admin'])){
      header('location:login_admin.php');
   }

    echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";

 ?>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="profile.css" type="text/css">
         
    <!-- body -->
    <div class="body">

    <?php
        echo '<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">';
        echo '<h1>Dashboard</h1>';
        
        echo '<section class="row text-center placeholders">';
        $users = User::getAllUser();
        echo '<div class="col-6 col-sm-6 placeholder" style="padding: 3rem 0;">';
        echo '<h1 style="color: brown;">' .count($users) .'</h1>';
        echo '<h4 style="color: brown;">Users</h4>';
        echo '<div class="text-muted">total in stock</div>';
        echo '</div>';
        
        $pd = Product::getAllProduct();
        echo '<div class="col-6 col-sm-6 placeholder" style="padding: 3rem 0;">';
        echo '<h1 style="color: brown;">' .count($pd) .'</h1>';
        echo '<h4 style="color: brown;">Products</h4>';
        echo '<span class="text-muted">total in stock</span>';
        echo '</div>';
        
        echo '</section>';
        echo "<h3>Sale users</h3>";
         echo "<table class='table table-striped'>
                    <thead>
                    <tr>
                    <th>#uid</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Product(s)</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>";
        
        // show all user
            foreach ($users as $u => $value)
            {
                $userid = $value->uid;
                $p = Product::getMyProduct($userid);
                $pcount =  count($p);
                if ($p == false){
                    $pcount = 0;
                }                       
                echo "<tr>";
                echo "<th scope='row'>" .$userid ."</th>";
                echo "<td>" .$value->username ."</td>";
                echo "<td>" .$value->email ."</td>";
                echo "<td>" .$pcount ."</td>";
                echo "<td><a href='delete_user.php?user=$value->email'>Delete user</a></td>";
            }
        echo "</main>"; ?>

         </div>
