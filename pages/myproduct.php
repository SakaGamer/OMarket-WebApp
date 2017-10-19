<?php

   require_once 'header.php';
   require_once '../db/model/product.class.php';

   if (!isset($_SESSION['user'])){
      header('location:login.php');
   }
   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";

 ?>
       
        <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1943533992560830";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

      <link rel="stylesheet" href="index.css" type="text/css">
         <div class="body">

         </div>
         <!-- div upcoming  -->
         <div class="upcoming">
            My Product
         </div>
         <!-- product -->
         <div class="result">

               <?php
                    if (isset($_GET['puid'])){
                        $puid = $_GET['puid'];
                        $products = Product::getMyProduct($puid);
                    } else{
                        $products = Product::getMyProduct($uid);   
                    }
                  if ($products){
                  foreach ($products as $p => $value ) {
                  $pid = $value->pid;
                          echo "<div class='fb-share-button' data-href='http://omarket.epizy.com/pages/product_detail.php?pid=$pid' data-layout='button' data-size='large' data-mobile-iframe='true'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fomarket.epizy.com%2Fpages%2Fproduct_detail.php%3Fpid%3D%2524pid&amp;src=sdkpreparse'>Share</a></div>";
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
                  echo "<div class='price'>" .$value->price ."</div>";
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
                  echo "<span class='more'><a href='delete_product.php?pid=$pid' onclick='return('ConfirmDelete?'>Delete</a></span>";
                
                  echo "<span class='more'><a href='edit.php?pid=$pid'>Edit</a></span>";
                  echo "</div>";
                  echo "</div></div>";
                  echo "<hr width='70%'>";
               }} else {
                  echo '<div class="noproduct">No product</div>';
               }
               ?>

         </div>
         
<!--
          <script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Delete Product?"))
            {
                        
            }
      }
  </script>
-->
  
  
<!--
         <script type="text/javascript">
             function doConfirm(id) {
            var ok = confirm("Are you sure to Delete?");
    if (ok) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "create_dealer.php";
            }
        }

        xmlhttp.open("GET", "delete_dealer.php?id=" + id);
        // file name where delete code is written
        xmlhttp.send();
    }
}
</script>
-->

<?php require_once 'footer.php'; ?>
