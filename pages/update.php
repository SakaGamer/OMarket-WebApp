<?php

   require_once "../db/model/product.class.php";
   require_once 'header.php';

   echo "<br>";
   echo "<br>";
   echo "<br>";
   echo "<br>";

   $pid = $_POST['pid'];
   $categoryID = $_POST['category'];
   $locationID = $_POST['location'];
   $pname = $_POST['pname'];
   $pdescr = $_POST['pdescr'];
   $phone1 = $_POST['phone1'];
   $phone2 = $_POST['phone2'];
   $currency = $_POST['currency'];
   $pprice = $_POST['price'] .$currency;
   $pdurationID = $_POST['duration'];
//    var_dump($currency);

   $store_dir = "http://localhost/ckcc/project/fileUploads/";
   $target_dir = "C:/wamp/www/ckcc/project/fileUploads/";
   $imgName = time();
   $store_file = $store_dir .$imgName .".jpg";
   $target_file = $target_dir .$imgName .".jpg";
   $uploadOk = 1;
   $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check file size
      if ($_FILES["imageUpload"]["size"] > 5000000) {
         echo "Your file was too large." ."<br>";
         $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
         echo "Only image JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
         echo "Your file was not uploaded." ."<br>";
         // if everything is ok, try to upload file
      } else {

         // create product
         $product = new Product();
         $product->pname = $pname;
         $product->cat_id = $categoryID;
         $product->loc_id = $locationID;
         $product->description = $pdescr;
         $product->phone = $phone1 ."/" .$phone2;
         $product->created = $imgName;
         $product->price = $pprice;
         $product->dur_id = $pdurationID;
         $product->uid = $uid;
//          var_dump($product);

         // upload image
         if (move_uploaded_file( $_FILES["imageUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded." ."<br>";
            $product->image_id = $store_file;
            // insert product
            $rs = Product::updateProduct($pid, $product);
         } else {
            // insert product
            $rs = Product::updateProduct($pid, $product);
            echo "There was an error uploading your image file." ."<br>";
         }

         if (!$rs){
            echo "product update fail" ."<br>";
         } else {
             header('location:myproduct.php');
            echo "product updated";
         }

      }

 ?>
