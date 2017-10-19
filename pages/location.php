<?php

   require_once 'header.php';

 ?>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="location.css" type="text/css">
      <div class="body">

         <div class="container" style="width: 70%">
        <!-- div upcoming  -->
      <div class="upcoming" style="width: 100%">
         Browse by location
      </div>

<!--      <div style="width: 50%; margin: auto;">-->

      <?php
         $conn = new mysqli("localhost", "root", "", "online_market") or die(mysql_error());
         // query location
         $query = "select name from location";
         $result = $conn->query($query) or die(mysql_error()."[".$query."]");
         while ($row = mysqli_fetch_assoc($result))
         {
            echo "<span class='row'>";
             echo "<div class='media my-1 justify-content-center'>";
             echo "<img src='../fileUploads/workspace.jpg' class='img-circle mr-3' width='80' height='80'>";
             echo "<div class='media-body'>";
             echo "<h5>" .$row['name'] ."</h5>";
//             echo "lorem ipsom dur ahmet";
             echo "</div>";
             echo "</div>";
             echo "</span>";
             echo "<hr>";
         }
       ?>
<!--       </div>-->
         </div>

       </div>
