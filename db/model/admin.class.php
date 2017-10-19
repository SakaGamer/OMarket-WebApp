<?php

   require_once "../db/library/database.class.php";

   class Admin
   {
      public $uid;
      public $adminname;
      public $email;
      public $password;

   static function getAllAdmin()
   {
      $admins = array();
      $result = Database::query("select * from admin");
      while ($row = mysqli_fetch_assoc($result))
      {
         $a = new Admin();
         $a->uid = $row["uid"];
         $a->adminname = $row["adminname"];
         $a->email = $row["email"];
         $a->password = $row["password"];

         $users[] = $u;
      }
      return $users;
   }

   static function getAdmin($email)
   {
      $result = Database::query("select * from admin where email = '$email' ");
      $row = mysqli_fetch_assoc($result);
      $a = new Admin();
         $a->uid = $row["uid"];
         $a->adminname = $row["adminname"];
         $a->email = $row["email"];
         $a->password = $row["password"];
      return $a;
   }

   static function login($mail, $pass)
   {
      $result = Database::query("select * from admin where
      email = '$mail' and password = '$pass' ");
      if (mysqli_num_rows($result) == 0){
         return false;
      }
      $row = mysqli_fetch_assoc($result);
      $a = new Admin();
         $a->uid = $row["uid"];
         $a->adminname = $row["adminname"];
         $a->email = $row["email"];
         $a->password = $row["password"];
      return $a;
   }

   static function register($admin)
   {
      $name = $admin->username;
      $mail = $admin->email;
      $pass = $admin->password;

      $result = Database::query("insert into admin (adminname, email, password) values ('$name', '$mail', '$pass')");

      if (!$result){
         echo "Error: " . $name . "<br>";
         echo "Error: " . $mail . "<br>";
         echo "Error: " . $pass . "<br>";
         return false;
      } else {
         echo "successful";
         return $admin;
      }

   }
       
    static function deleteAdmin($email)
    {
        $result = Database::query("delete from admin where email = '$email' ");
        if ($result)
        {
            return true;
        } else return false;
    }

}

 ?>
