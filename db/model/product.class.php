<?php

   require_once '../db/library/database.class.php';

   class Product
   {
      public $pid;
      public $pname;
      public $cat_id;
      public $loc_id;
      public $description;
      public $phone;
      public $price;
      public $dur_id;
      public $uid;

      static function getAllProduct()
      {
         $products = array();
         $result = Database::query("select product.*, location.name from product, location where product.loc_id = location.id order by product.created desc");
         // if (mysqli_num_rows($result) == 0){
         //    return false;
         // }
         while ($row = mysqli_fetch_assoc($result))
         {
            $p = new Product();
            $p->pid = $row['pid'];
            $p->cat_id = $row['cat_id'];
            $p->loc_id = $row['name'];
            $p->pname = $row['pname'];
            $p->description = $row['description'];
            $p->phone = $row['phone'];
            $p->price = $row['price'];
            $p->image_id = $row['image_id'];
            $p->created = $row['created'];
            $p->dur_id = $row['dur_id'];
            $p->uid = $row['uid'];
             $p->hit = $row['hit'];

            $products[] = $p;
         }
         return $products;
      }

      static function getMyProduct($uid)
      {
         $products = array();
         $result = Database::query("select product.*, location.name from product, location where product.loc_id = location.id and product.uid = '$uid' order by product.created desc");
         if (mysqli_num_rows($result) == 0){
            return false;
         }
         while ($row = mysqli_fetch_assoc($result))
         {
            $p = new Product();
            $p->pid = $row['pid'];
            $p->cat_id = $row['cat_id'];
            $p->loc_id = $row['name'];
            $p->pname = $row['pname'];
            $p->description =$row['description'];
            $p->phone = $row['phone'];
            $p->price = $row['price'];
            $p->image_id = $row['image_id'];
            $p->created = $row['created'];
            $p->dur_id = $row['dur_id'];
            $p->uid = $row['uid'];
              $p->hit = $row['hit'];

            $products[] = $p;
         }
         return $products;
      }

      static function getProduct($pid)
      {
         $result = Database::query("select product.*, location.name from product, location where product.loc_id = location.id and product.pid = '$pid' ");
         if (mysqli_num_rows($result) == 0){
            return false;
         }
         $row = mysqli_fetch_assoc($result);

            $p = new Product();
            $p->pid = $row['pid'];
            $p->cat_id = $row['cat_id'];
            $p->loc_id = $row['name'];
            $p->pname = $row['pname'];
            $p->description =$row['description'];
            $p->phone = $row['phone'];
            $p->price = $row['price'];
            $p->image_id = $row['image_id'];
            $p->created = $row['created'];
            $p->dur_id = $row['dur_id'];
            $p->uid = $row['uid'];
           $p->hit = $row['hit'];

         return $p;
      }

      static function getProductSearch($keyword)
      {
         $products = array();
         $result = Database::query("select product.*, location.name from product, location where product.loc_id = location.id and product.pname like '%$keyword%' order by product.created desc");
         if (mysqli_num_rows($result) == 0){
            return false;
         }
         while ($row = mysqli_fetch_assoc($result))
         {
            $p = new Product();
            $p->pid = $row['pid'];
            $p->cat_id = $row['cat_id'];
            $p->loc_id = $row['name'];
            $p->pname = $row['pname'];
            $p->description = $row['description'];
            $p->phone = $row['phone'];
            $p->price = $row['price'];
            $p->image_id = $row['image_id'];
            $p->created = $row['created'];
            $p->dur_id = $row['dur_id'];
            $p->uid = $row['uid'];
              $p->hit = $row['hit'];

            $products[] = $p;
         }
         return $products;
      }

      static function addProduct($product)
      {
         $pname = $product->pname;
         $pcatID = $product->cat_id;
         $plocID = $product->loc_id;
         $pdescr = $product->description;
         $pphone = $product->phone;
         $pprice = $product->price;
         $pimage = $product->image_id;
         $pcreated= $product->created;
         $pdurID = $product->dur_id;
         $puid = $product->uid;

         $result = Database::query("insert into product (cat_id, loc_id, pname, description, phone, price, image_id, created, dur_id, uid) values ('$pcatID', '$plocID', '$pname', '$pdescr', '$pphone', '$pprice', '$pimage', '$pcreated', '$pdurID', '$puid')");

         if (!$result){
            echo "unsuccessful" ."<br>";
            return false;
         } else {
            echo "successful" ."<br>";
            return true;
         }
         return $result;
      }

       static function getHit($pid){
           $result = Database::query("select hit from product where pid = '$pid' ");
           $row = mysqli_fetch_assoc($result);
           return $row['hit'];
       }
       
       
       static function addHit($pid){
           $old_hit = (int) Product::getHit($pid);
           $new_hit = (int) $old_hit + 1;
           $result = Database::query("update product set hit = '$new_hit' where pid = '$pid' ");
           if (!$result){
            echo "unsuccessful" ."<br>";
            return false;
         } else {
            echo "successful" ."<br>";
            return true;
         }
         return $result;
       }
       
      static function updateProduct($pid, $product)
      {
         $pname = $product->pname;
         $pcatID = $product->cat_id;
         $plocID = $product->loc_id;
         $pdescr = $product->description;
         $pphone = $product->phone;
         $pprice = $product->price;
         // $pimage = $product->image_id;
         $pcreated= $product->created;
         $pdurID = $product->dur_id;
         $puid = $product->uid;

         $result = Database::query("update product set cat_id = '$pcatID', loc_id = '$plocID', pname = '$pname', description = '$pdescr', phone = '$pphone', price = '$pprice', created = '$pcreated', dur_id = '$pdurID' where pid = '$pid' and uid = '$puid' ");

         if (!$result){
            echo "unsuccessful" ."<br>";
            return false;
         } else {
            echo "successful" ."<br>";
            return true;
         }
         return $result;
      }

      static function deleteProduct($pid, $uid){
         $result = Database::query("delete from product where pid = '$pid' and uid = '$uid' ");
         if ($result){
            return true;
         } else {
            return false;
         }
      }

   }

 ?>
