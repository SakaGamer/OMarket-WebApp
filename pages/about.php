<?php

   require_once 'header.php';

 ?>
    
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
                 <style>
.fa {
    padding: 20px;
    font-size: 35px;
    text-align: center;
    text-decoration: none;
    margin: 5px auto;
    border-radius: 50%;
    color: black;
}
.fa:hover {
    opacity: 0.8;
    color: brown;
}
.social{
    margin: auto;   
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
}
.admin{
    font-weight: bold;
    border: thin solid black;
    padding: 0.5%;
    position: absolute;
    bottom: 0;
    right: 0;
}
</style>

    <center>
   <!-- body -->
   <div class="body">
       <img src="../fileUploads/workplace.jpg" width="200" height="200" style="border-radius: 50%;">
      <div class="text" style="font-size: 200%;">
         Online Market
      </div><br>
       
      <div class="text">
          Omarket  is an application that allow you to sell your product online and also buy product online. It consists of seller all over the province in Cambodia. Your sold product are seen by all people who visit our site. 
      </div>

  
        <div class="social">
            <!-- Add font awesome icons -->
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
        
        <?php 
            if (isset($_SESSION['admin'])){
                echo '<div class="admin">
                    <a href="dashboard.php">Dashboard</a>
                </div>';
            } else {
                echo '<div class="admin">
            <a href="login_admin.php">Log in as Admin</a>
        </div>';
            }
        ?>
  
   </div>
</center>