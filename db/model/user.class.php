<?php

   require_once "../db/library/database.class.php";

   class User
   {
      public $uid;
      public $username;
      public $email;
      public $password;

   static function getAllUser()
   {
      $users = array();
      $result = Database::query("select * from user");
      while ($row = mysqli_fetch_assoc($result))
      {
         $u = new User();
         $u->uid = $row["uid"];
         $u->username = $row["username"];
         $u->email = $row["email"];
         $u->password = $row["password"];

         $users[] = $u;
      }
      return $users;
   }

   static function getCurrentUser($email)
   {
      $result = Database::query("select * from user where email = '$email' ");
      $row = mysqli_fetch_assoc($result);
      $u = new User();
      $u->uid = $row["uid"];
      $u->username = $row["username"];
      $u->email = $row["email"];
      $u->password = $row["password"];
      return $u;
   }
       
    static function getUser($uid)
    {
        $result = Database::query("select * from user where uid = '$uid' ");
        $row = mysqli_fetch_assoc($result);
      $u = new User();
      $u->uid = $row["uid"];
      $u->username = $row["username"];
      $u->email = $row["email"];
      $u->password = $row["password"];
      return $u;
    }

   static function login($mail, $pass)
   {
      $result = Database::query("select * from user where
      email = '$mail' and password = '$pass' ");
      if (mysqli_num_rows($result) == 0){
         return false;
      }
      $row = mysqli_fetch_assoc($result);
      $u = new User();
      $u->uid = $row["uid"];
      $u->username = $row["username"];
      $u->email = $row["email"];
      $u->password = $row["password"];
      return $u;
   }

   static function register($user)
   {
      $name = $user->username;
      $mail = $user->email;
      $pass = $user->password;

      $result = Database::query("insert into user (username, email, password) values ('$name', '$mail', '$pass')");

      if (!$result){
         echo "Error: " . $name . "<br>";
         echo "Error: " . $mail . "<br>";
         echo "Error: " . $pass . "<br>";
         return false;
      } else {
         echo "successful";
         return $user;
      }

   }
       
    static function deleteUser($email)
    {
        $result = Database::query("delete from user where email = '$email' ");
        if ($result)
        {
            return true;
        } else return false;
    }

}

 ?>
