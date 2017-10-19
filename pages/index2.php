<?php 

    require_once "header2.php";
    require_once "../db/model/product.class.php";

?>

     
 <style>
    .main{
        position: absolute;
        top: 30%;
        width: 100%;
    }
</style>
<link rel="stylesheet" href="index.css" type="text/css">
           <link rel="stylesheet" href="style.css" type="text/css">  
            
         <div class="bg">
    <center>
        <div class="main">
            <div class="title">Online Market</div>
            <div class="subtitle">Buy/Sell everything online</div>

            <!-- search  -->
            <div class="search">
               <form action="search.php" method="post">
                  <input class="search" type="search" name="search" placeholder="what are you looking for?">
                  <input type="submit" class="btn" value="Search">
               </form>
            </div>
            
            <?php
            if (!isset($_SESSION['user'])){
               // <!-- login button -->
               echo '<div class="below">
                  <div class="btn">
                     <a href="login.php">Login</a>
                  </div><br>
                  <label class="text" style="color:white;">to view all your product</label>
               </div>';
               // <!-- register button -->
               echo '<div class="below">
                  <div class="btn">
                     <a href="register.php"> Register </a>
                  </div><br>
                  <label class="text" style="color:white;">to begin sale your product</label>
               </div>';
            } ?>
            
        </div>
    </center>
</div>    




 
      <!-- container -->
      <div class="container" style="width: 50%;">
            <!-- div upcoming  -->
      <div class="upcoming"  style="width: 100%">
         Upcoming
      </div>

            <?php
               $products = Product::getAllProduct();
               if ($products){
               foreach ($products as $p => $value ) {
               $pid = $value->pid;
                // media
               echo "<div class='media my-4' id='$pid' style='height: 180;'>";
               echo "<img src='" .$value->image_id ."' class='mr-5' width='180' height='180'>";
               echo "<div class='media-body'>";
                // inner media
               echo "<div class='media'>";
               echo "<div class='date'>";
               $ts = $value->created;
               echo "<div class='day'>" .date('d', $ts) ."</div>";
               echo "<div class='month'>" .date('M', $ts) ."</div>";
               echo "</div>";
               echo "<div class='media-body'>";
               $pname = $value->pname;
               if (strlen($pname) >= 30){
                     $pname = substr($pname, 0, 30) ."...";
               }
               echo "<h5><a href='pdt.php?pid=$pid'>" .$pname ."</a></h5>";
               echo "<div class='price'>" .$value->price ."</div>";
               echo "</div>";
               echo "</div>";
               // description
               $descr = $value->description;
               if (strlen($descr) >= 187){
                     $descr = substr($descr, 0, 187) ."...";
               }
               echo $descr;
//               echo "</div>";
//               echo "</div>";
               echo "<span class='location'>" .$value->loc_id ."</span>";
               echo "<span class='more'><a href='product_detail.php?pid=$pid'>More info</a></span>";
//               echo "</div>";
               echo "</div></div>";
               echo "<hr>";
            }} else {
               echo '<div class="noproduct">No product</div>';
            }
             ?>

      <!-- div container -->
      </div>

<?php require_once 'footer.php'; ?>