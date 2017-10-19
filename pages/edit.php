<?php

   require_once 'header.php';
   require_once '../db/model/product.class.php';

   if (!isset($_SESSION['user'])){
      header('location:login.php');
   }

   // product id
   if (isset($_GET['pid'])){
        $pid = $_GET['pid'];
   }
   $conn = new mysqli("localhost", "root", "", "online_market");

   $p = Product::getProduct($pid);
   $pimage = $p->image_id;
   $pname= $p->pname;
   $pcat_id = $p->cat_id;
   $ploc_id = $p->loc_id;
   $pdescr = $p->description;
   $pphone = $p->phone;
   $pprice = $p->price;
   $pdur_id = $p->dur_id;
//
//    echo "<br>";
//echo "<br>";
//echo "<br>";
//echo "<br>";
//    var_dump($p);

 ?>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="edit.css" type="text/css">

   <!-- body -->
   <div class="body">
   <form action="update.php" method="post" enctype="multipart/form-data">

            <!-- left side -->
            <span class="left">
               <!-- image -->
                  <img src='<?php echo "$pimage";  ?>' width="200" height="220" class="pf">
                  <div class="text_left">Choose your image:</div>
                  <input type="file" name="imageUpload" src='<?php echo "$pimage"; ?>'><br>
            </span>

            <!-- right side -->
            <span class="right">

            <!-- category -->
            <div class="text_left">Categories:</div>
            <select class="form-control" name="category">
               <?php
               $query = "select * from category";
               $result = $conn->query($query) or die(mysql_error()."[".$query."]");
               while ($row = mysqli_fetch_assoc($result))
               {
                  if ($row['id'] == $pcat_id)
                  {
                     echo "<option value='" .$row['id'] ."' selected>" .$row['name'] ."</option>";
                  } else {
                     echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
                 }
                 } ?>
            </select>

            <!-- location -->
            <div class="text_left">Location:</div>
            <select class="form-control" name="location">
            <?php
               $query = "select * from location";
               $result = $conn->query($query) or die(mysql_error()."[".$query."]");
               while ($row = mysqli_fetch_assoc($result))
               {
                  if ($row['name'] == $ploc_id)
                  {
                     echo "<option value='" .$row['id'] ."' selected>" .$row['name'] ."</option>";
                  } else {
                     echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
                  }
             } ?>
      </select>

               <!-- name -->
               <div class="text_left">Product name:</div>
               <input type="text" class="form-control" name="pname" placeholder="Product Name" value='<?php echo "$pname"; ?>' required>

               <!-- product description -->
               <div class="text_left">Description:</div>
               <textarea class="form-control" name="pdescr" rows="6" cols="40">
                  <?php echo "$pdescr"; ?>
               </textarea>

            <!-- phone number -->
            <div class="text_left">Phone number:</div>
            <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" name="phone1" placeholder="Phone1" value="<?php $contact = explode("/", $pphone);
                     if (!$contact == ""){
                        echo "$contact[0]";
                   }  ?>" required> 
                </div>
                <div class="col">
                  <input type="text" class="form-control" name="phone2" placeholder="Phone2" value="<?php $contact = explode("/", $pphone);
                  if (!$contact == ""){
                        echo "$contact[1]";
                   } ?>">
                </div>
              </div>
                     

         <!-- product price -->
         <div class="text_left">Price:</div>
         <div class="form-row">
            <div class="col">
              <input type="number" name="price" class="form-control" placeholder="Price"  value='<?php $value = substr($pprice, 0, strlen($pprice)-1); echo "$value"; ?>' required>
            </div>
            <div class="col">
                <select class="form-control" name="currency">
                    <?php
               $cc = substr($pprice, strlen($pprice)-1, strlen($pprice));
               $query = "select * from currency";
               $result = $conn->query($query) or die(mysql_error()."[".$query."]");
               while ($row = mysqli_fetch_assoc($result))
               {
                  if ($row['csign'] == $cc)
                  {
                     echo "<option value='" .$row['csign'] ."' selected>" .$row['cname'] ."</option>";
                  } else {
                     echo "<option value='" .$row['csign'] ."'>" .$row['cname'] ."</option>";
                  }
             } ?>
               </select>
              </div>
         </div>

        <!-- product duration -->
        <div class="text_left">Duration (day):</div>
        <select class="form-control" name="duration">
          <?php
             $query = "select * from duration";
             $result = $conn->query($query) or die(mysql_error()."[".$query."]");
             while ($row = mysqli_fetch_assoc($result))
             {
                if ($row['id'] == $pdur_id)
                {
                    echo "<option value='" .$row['id'] ."' selected>" .$row['name'] ."</option>";
                } else {
                   echo "<option value='" .$row['id'] ."'>" .$row['name'] ."</option>";
                }
              } ?>
        </select>

        <!-- product id -->
        <input type="hidden" name="pid" value='<?php echo "$pid"; ?>'>

        <!-- update button -->
        <center>
            <input class="btn btn-primary" style="width: 80%; margin: 4% auto;" type="submit" value="Update">
        </center>


         </span>
    </form>
</div>
