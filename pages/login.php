<?php

   require_once 'header.php';
   // session_start();
   if (isset($_SESSION['user'])){
      header('location:myproduct.php');
   }

 ?>

         <link rel="stylesheet" href="login.css" type="text/css">
         <center>
         <!-- body-->
         <div class="body">
            <h2 class="text_head">Login Form</h2>

            <!-- form -->
            <div class="frame_card">
               <form action="dologin.php" method="post">
                  <div style="width: 50%;">

                  <!-- email -->
                  <div>
                     <div class="text_left"> Email: </div>
                     <input type="email" name="email" placeholder="Email" required>
                  </div>

                  <!-- password -->
                  <div>
                     <div class="text_left"> Password: </div>
                     <input type="password" name="password" placeholder="Password" required>
                  </div>

                  <!-- forget password -->
                  <a class="text_forgot">Forgot password</a>

                  <!-- login button -->
                  <div>
                     <input class="btn" type="submit" value="Login">
                  </div>

                  </div>
               </form>

            <a class="text" href="register.php">New to Online Market? Register</a>
            </div>
         </div>


      </center>
   </body>
</html>
