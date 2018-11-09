<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('\sqlite\koncar.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "<h1> Končar - baza djelatnika </h1>";
   }
 ?>
 
