<?php
  include_once "../database/database.php";
  $date = $db->query("select distinct date from galy_time_tables");
  $date = $date->fetch_all(MYSQLI_NUM);
 echo json_encode($date);
?>