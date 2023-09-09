<?php
include_once "../database/database.php";
$students = $db->query("select * from galy_time_tables");
$students = $students->fetch_all();
foreach($students as $student){
    echo json_encode($student)."<br>";
}
echo json_encode($students);
echo "this is test php";


?>