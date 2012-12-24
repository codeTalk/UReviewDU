<?php
   # pdo_testdb_connect.php - function for connecting to the "test" database

   function testdb_connect ()
   {
     $dbh = new PDO("mysql:host=localhost;dbname=ureviewdu", "root", "");
     return ($dbh);
   }
?>