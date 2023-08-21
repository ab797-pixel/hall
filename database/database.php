<?php 
 
 // Database configuration 
 $dbHost     = "localhost"; 
 $dbUsername = "root"; 
 $dbName     = "hall"; 
  
 // Create database connection 
 $db = new mysqli($dbHost, $dbUsername, '', $dbName); 
  
 // Check connection 
 if ($db->connect_error) { 
     die("Connection failed: " . $db->connect_error); 
 } 
  
 ?>