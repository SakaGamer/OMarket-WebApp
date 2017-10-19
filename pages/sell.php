<?php

   require_once 'header.php';

   if (!isset($_SESSION['user'])){
      header('location:login.php');
   }
   $conn = new mysqli("localhost", "root", "", "online_market");

 ?>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      
   <!-- body -------->
      <div class="body">
        
            
        
         <h2 class="text_head" style="margin: auto;">sell product...</h2>

         <!-- form -->
      <div class="frame_card">
      <div style="width: 50%; margin: auto;">
         <form action="dosell.php" method="post" enctype="multipart/form-data">

        <!-- category -->
        <div class="text_left">Categories:</div>
            <select class="form-control" name="category">
                  <?php
                     $query = "select * from category";
                     $result = $conn->query($query) or die(mysql_error()."[".$query."]");
                     while ($row = mysqli_fetch_assoc($result)) {
                     echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
                  } ?>
            </select>

         <!-- location -->
         <div class="text_left">Location:</div>
         <select class="form-control" name="location">
               <?php
                  $query = "select * from location";
                  $result = $conn->query($query) or die(mysql_error()."[".$query."]");
                  while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
               } ?>
        </select>

        <!-- product image -->
        <div class="text_left">Choose your image:</div>
        <input type="file" name="imageUpload">

         <!-- name -->
        <div class="text_left">Product name:</div>
           <input type="text" name="pname" class="form-control" placeholder="Product name" required>
<!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->

         <!-- product description -->
         <div class="text_left">Description:</div>
        <textarea class="form-control" name="pdescr" rows="4" placeholder="Describe your product"></textarea>

         <!-- phone number -->
        <div class="text_left">Phone number:</div>
         <div class="form-row">
            <div class="col">
              <input type="tel" name="phone1" class="form-control" placeholder="Phone1" required>
            </div>
            <div class="col">
              <input type="tel" name="phone2" class="form-control" placeholder="Phone2">
            </div>
          </div>

         <!-- product price -->
         <div class="text_left">Price:</div>
         <div class="form-row">
            <div class="col">
              <input type="number" name="price" class="form-control" placeholder="Price" required>
            </div>
            <div class="col">
                <select class="form-control" name="currency">
                    <option value="USD">USD</option>
                    <option value="KHR">KHR</option>
               </select>
              </div>
         </div>

         <!-- product duration -->
        <div class="text_left">Duration (day):</div>
            <select class="form-control" name="duration">
              <?php
                     $query = "select * from duration";
                     $result = $conn->query($query) or die(mysql_error()."[".$query."]");
                     while ($row = mysqli_fetch_assoc($result)) {
                     echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
                  } ?>
           </select>

         <!-- publish button -->
        <center>
            <input class="btn btn-primary" style="width: 80%; margin: 4% auto;" type="submit" value="Publish">
        </center>

      </form>
     </div>
      </div>
      </div>

<?php require_once "footer.php" ?>
