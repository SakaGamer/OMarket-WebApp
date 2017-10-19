<?php

   /**
    *
    */
   class Database{
      static $server = "localhost";
      static $db = "online_market";
      static $user = "root";
      static $pass = "";

      static function query($sql){
         // Create connection
         $conn = new mysqli(self::$server, self::$user, self::$pass, self::$db);

         // Check connection
         if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
         }

         $result = $conn->query($sql);
         if (!$result) return false;
         $conn->close();
         return $result;

         // // Create connection
         // $conn = mysqli_connect(self::$server, self::$user, self::$pass, self::$db);
         // // Check connection
         // if (!$conn){
         //    die("Connection Error") ."<br>";
         // }
         // echo "Connected" ."<br>";
         // // Test
         // $result = mysqli_query($conn, $sql);
         // if (!$result) return false;
         // mysqli_close($conn);
         // return $result;

      }

   }

 ?>
