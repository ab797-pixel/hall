<?php
  $name = $_POST["name"];
  $pass = $_POST["password"];
  if($name != "" || $pass != ""){
    if($name == "abdulla" && $pass == "123"){
        echo "user name and pass word correct";
    }
  }
  else{
    echo "Enter both fileds";
  }

?>