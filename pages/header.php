<?php require_once "../db/model/product.class.php"; ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>

      <link rel="stylesheet" href="style.css" type="text/css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.dropbtn {
    background-color: transparent;
    color: white;
    border: none;
    cursor: pointer;
    font-family: candara;
    font-size: 16px;
    text-transform: uppercase;
    font-weight: bold;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 120px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    text-decoration: none;
    display: block;
    padding: 4px;
    border-radius: 4px;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
  
   </head>
   <body>

      <center>
         <div class="topbar">
         <!-- logo -->
         <div class="logo">
            <a href="index.php" style="color: #faffbd">Online Market</a>
         </div>
         
         <?php
         session_start();
                  if (isset($_SESSION['user']))
                  {
                     $uid = $_SESSION['uid'];
                     $email = $_SESSION['user'];
                     $username = $_SESSION['username'];
                  } 
                else if (isset($_SESSION['admin']))
                  {
                        $uid = $_SESSION['uid'];
                        $email = $_SESSION['admin'];
                        $adminname = $_SESSION['adminname'];
                        $username = "Admin";
                  } else {
                     $username = 'Profile';
                  } 
             ?>

         <!-- navigation link -->
         <div class="navlink">
            <ul>
               <li><a href="index.php" class="link">Home</a></li>
               <li><a href="sell.php" class="link">Sell</a></li>
               <li><a href="myproduct.php" class="link">My Product</a></li>
<!--               <li><a href="location.php" class="link">Location</a></li>-->
               <li><a href="about.php" class="link">About</a></li>
                  
            <div class="dropdown">
               <?php
                if (isset($_SESSION['user']) or isset($_SESSION['admin']) ){
                    echo '<button id="myBtn" class="dropbtn">' .$username ."</button>";
                    echo '<div id="myDropdown" class="dropdown-content">';
                    echo '<a href="profile.php">Profile</a>';
                    echo '<a href="logout.php">Log out</a>';
                    echo '</div>';   
                } 
                ?>
            </div>
              
            </ul>
           
            
            <script>
// Get the button, and when the user clicks on it, execute myFunction
document.getElementById("myBtn").onclick = function() {myFunction()};

/* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>
            
         </div>
      </div>
   </center>
