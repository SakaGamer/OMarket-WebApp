<?php

   require_once 'header.php';
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

      <!-- div upcoming  -->
      <div class="upcoming">
         Upcoming
      </div>
      <!-- product -->
      <div class="result">

            <?php
               $products = Product::getAllProduct();
               if ($products){
               foreach ($products as $p => $value ) {
               $pid = $value->pid;
               echo "<div class='item card' id='$pid'>";
               echo "<img src='" .$value->image_id ."' width='180' height='180'>";
               // product info
               echo "<div class='info'>";
               echo "<div>";
               // title
               echo "<div style='display: flex;'>";
               echo "<div class='date'>";
               $ts = $value->created;
               echo "<div class='day'>" .date('d', $ts) ."</div>";
               echo "<div class='month'>" .date('M', $ts) ."</div>";
               echo "</div>";
               echo "<div>";
               $pname = $value->pname;
               if (strlen($pname) >= 30){
                     $pname = substr($pname, 0, 30) ."...";
               }
               echo "<div class='pname'><a href='pdt.php?pid=$pid'>" .$pname ."</a></div>";
               echo "<span class='price'>" .$value->price ."</span>";
                echo "</div>";
               echo "</div>";
               // description
               $descr = $value->description;
               if (strlen($descr) >= 187){
                     $descr = substr($descr, 0, 187) ."...";
               }
               echo "<div class='descr'><p>" .$descr ."</p></div>";
               echo "</div>";
               echo "<div>";
               echo "<span class='location'>" .$value->loc_id ."</span>";
               echo "<span class='more'><a href='product_detail.php?pid=$pid'>More info</a></span>";
                echo "<span class='hit'>" .'<i class="fa fa-hand-o-down"></i> hits ' .$value->hit ."</span>";
               echo "</div>";
               echo "</div></div>";
               echo "<hr width='70%'>";
            }} else {
               echo '<div class="noproduct">No product</div>';
            }
             ?>

      <!-- div result -->
      </div>

      <?php
      // $query = "select * from product";
      // $result = $conn->query($query);
      // $count = mysqli_num_rows($result);
      // $total = ceil($count/5);
      // echo "<br>" .$total;
      //
      // for ($i=1; $i<=$total; $i++){
      //    echo "<a href='index.php?page='>".$i ."</a>" ."<br>";
      // }
       ?>

<?php require_once 'footer.php'; ?>
