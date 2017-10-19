<?php

   require_once 'header.php';
   if (isset($_SESSION['user'])){
      header('location:index.php');
   }

 ?>

         <link rel="stylesheet" href="login.css" type="text/css">
         <center>
         <!-- body -->
         <div class="body">
            <h2 class="text_head">Registration Form</h2>

            <!-- form -->
            <div class="frame_card">
               <form action="doregister.php" method="post">
                  <div style="width: 50%;">

               <!-- username -->
               <div>
                  <div class="text_left"> Username: </div>
                  <input type="text" name="username" placeholder="Username">
               </div>

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

               <!-- confirm password -->
               <div>
                  <div class="text_left"> Confirm password: </div>
                  <input type="password" name="confirm_password" placeholder="Confirm Password" required>
               </div>

               <!-- register button -->
               <div>
                  <input class="btn" type="submit" value="Register">
               </div>

               </div>
            </form>

            <a class="text" href="login.html">Already have account? Login</a>

         </div>
      </center>
   </body>
</html>
