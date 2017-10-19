<?php

   require_once 'header.php';
   require_once '../db/model/product.class.php';

 ?>
            <link rel="stylesheet" href="edit.css" type="text/css">
            <center>
            <!-- body -->
            <div class="body">

            <!-- frame card -->
            <div class="">
               <div style="width: 80%;">

                  <?php
                        if (isset($_GET['pid'])){
                           $pid = $_GET['pid'];
                        }
                        $p = Product::getProduct($pid);
                        echo "<img src='" .$p->image_id ."' width='200' height='220'>";
                        // product
                        echo "<div>";
                        echo "<div style='width: 80%;'>";
                        // name
                        echo "<div class='text' style='font-weight: bold;'>" .$p->pname ."</div>";
                        // location and price
                        echo "<div style='display: flex;'>";
                        echo "<div  style='width: 50%;'>";
                        echo "<div class='text_left'>Price:</div>";
                        echo "<div class='border'>";
                        echo "<div class='text' style='font-weight: bold;'>" .$p->price ."</div>";
                        echo "</div></div>";
                        echo "<div style='width: 50%;'>";
                        echo "<div class='text_left'>Location:</div>";
                        echo "<div class='border' style='margin-left: 1%;'>";
                        echo "<div class='text' style='font-weight: bold;'>" .$p->loc_id ."</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        // description
                        echo "<div class='text_left'>Description:</div>";
                        echo "<div class='border'>";
                        echo "<div class='text'>" .$p->description ."</div>";
                        echo "</div>";
                        // contact
                        echo "<div class='text_left'>Contact:</div>";
                        echo "<div class='border'>";
                        $contact = explode("/", $p->phone);
                        foreach ($contact as $value)
                        {
                           if (!$value == ""){
                              echo "<div class='text'>" .$value  ."</div>";
                           }
                        }
                        echo "</div>";
                   ?>

               </div>
            </div>


            <!-- button other -->
            <div class="below">
               <div class="btn">
                  <a href="#">Other</a>
               </div>
            </div>

            <!-- button related -->
            <div class="below">
               <div class="btn">
                  <a href="#">Related</a>
               </div>
            </div>

         </div>
      </center>
<?php require_once 'footer.php'; ?>
