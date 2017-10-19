<?php

   require_once '../db/library/database.class.php';

   /**
    *
    */
   class ClassName
   {
      public $cid;
      public $uid;
      public $pid;
      public $phone1;
      public $phone2;
      public $phone3;
      public $fb;
      public $pf;
      public $email;

      static function addContact()
      {
         $result = Database::query("insert into contact (pid, uid, phone1, phone2, phone3) values () ");
      }

   }



 ?>
