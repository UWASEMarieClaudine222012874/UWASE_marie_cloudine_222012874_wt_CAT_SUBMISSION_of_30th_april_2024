<?php
      $host = "localhost";
      $user = "uwase";
      $pass = "222012874";
      $database = "inyange_enterprises";

      $connection = new mysqli($host, $user, $pass, $database);

      if ($connection->connect_error) {
          die("Connection failed: " . $connection->connect_error);
      }
?>