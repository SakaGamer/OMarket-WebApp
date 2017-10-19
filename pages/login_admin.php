<?php

   require_once 'header.php';
   if (isset($_SESSION['admin'])){
      header('location:dashboard.php');
   }

 ?>

         <link rel="stylesheet" href="login.css" type="text/css">
         <center>
         <!-- body-->
         <div class="body">
            <h2 class="text_head">Admin Login</h2>

            <!-- form -->
            <div class="frame_card">
               <form action="dologin_admin.php" method="post">
                  <div style="width: 50%;">

                  <!-- email -->
                  <div>
                     <div class="text_left"> Email: </div>
                     <input type="email" name="email" placeholder="Admin Email" required>
                  </div>

                  <!-- password -->
                  <div>
                     <div class="text_left"> Password: </div>
                     <input type="password" name="password" placeholder="Admin Password" required>
                  </div>

                  <!-- login button -->
                  <div>
                     <input class="btn" type="submit" value="Login">
                  </div>

                  </div>
               </form>

            </div>
         </div>

      </center>
  
  <?php require_once "footer.php"; ?>
