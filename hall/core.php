<?php
include_once '../database/database.php'; 
$date = $_POST['date'];
$sessions1 = $db->query("select distinct session from time_tables where date='$date'");
$sessions = $sessions1->fetch_all(MYSQLI_ASSOC);
foreach($sessions as $session){
         $session = $session['session'];
          $first = [];
          $halls = 0;
          $i = 1;
          $a = 1;
          $total_students = 0;
    $time_tables =$db->query("select distinct subcode from time_tables where date = '$date' and session='$session'");
    $subcodes = $time_tables->fetch_all(MYSQLI_ASSOC);
    

    // echo json_encode($subcodes);
    foreach($subcodes as $subcode){
        $subcode = $subcode['subcode'];
        //echo json_encode($subcode);
       $count = $db->query("select * from galies where subcode='$subcode'");
       $count = $count->fetch_all();
       $total_students += count($count); 
       $halls += count($count)/30;
      // echo $total_students.'<br>';  
    }
    $fraction = $halls - floor($halls);
    if($fraction < 0.5){
        $halls =$halls + 1;
    }
    foreach($subcodes as $subcode){
        $subcode = $subcode['subcode'];
        //echo json_encode($subcode);
    
       $galies = $db->query("select distinct subject from galies where subcode='$subcode' order by degree");
       $galies = $galies->fetch_all(MYSQLI_ASSOC); 
       foreach($galies as $galy){
        $dept = $galy['subject'];
         $group_students = $db->query("select * from galies where subcode = '$subcode' and subject = '$dept' order by reg_no");
         $group_students = $group_students->fetch_all(MYSQLI_ASSOC);
         foreach($group_students as $students){
           // echo json_encode($student);
            array_push($first,$students); 
            //echo json_encode($first); 
            if($i > round($halls)) {
                if($total_students/1.1 > count($first)){
                    $i = 1;
                }
            } 
            // echo 'hall '.$i.'<br>';
            // echo 'date'.$date.'<br>';
            // echo 'session'.$session.'<br>';
            // echo 'subcode'.$subcode.'<br>';
            // echo 'reg'.$students["reg_no"].'<br>';
            // echo 'dept '.$students["subject"].'<br>';
          $db->query("INSERT INTO galy_time_tables (hall_number, date, session, subcode, degree, subject, reg_no) VALUES ('".$i."', '".$date."', '".$session."', '".$subcode."', '".$students['degree']."', '".$students['subject']."', '".$students['reg_no']."')");    
            $a++;
            if($a > 15){
                $i++;
                $a = 1;
            } 
         }
        // echo json_encode($group_students);
       // echo $subcode."=>".json_encode($galy['subject']);
        
       } 
    //  $group_students =  $db->query("select distinct subject from galies where subcode='$subcode' ")
     //  echo $subcode." =>".json_encode($galies);
    //    foreach($galies as $galy){
    //     $results[$galy['subject']][] = $galy;
    //    // echo json_encode($results)."<br>";
    //     foreach($results as $dept=>$group_students){
    //         echo $dept."  ";
    //     }
    //    }
      
       //echo json_encode($galies);

    }

}
      /* $total_students += count($galies); 
      // $halls += count($galies)/30;
      // echo $total_students.'<br>';  
    }
   // $fraction = $halls - floor($halls);
   // if($fraction < 0.5){
        //$halls =$halls + 1;
    }
    foreach($subcodes as $subcode){
        $subcode = $subcode['subcode'];
        $depts = $db->query("select * from galies where subcode='$subcode'");
        $depts = $depts->fetch_all(MYSQLI_ASSOC);
        foreach($depts as $students){
               //echo json_encode($students); 
                array_push($first,$students); 
                //echo json_encode($first); 
                if($i > round($halls)) {
                    if($total_students/1.1 > count($first)){
                        $i = 1;
                    }
                } 
                // echo 'hall '.$i.'<br>';
                // echo 'date'.$date.'<br>';
                // echo 'session'.$session.'<br>';
                // echo 'subcode'.$subcode.'<br>';
                // echo 'reg'.$students["reg_no"].'<br>';
                // echo 'dept '.$students["subject"].'<br>';
              $db->query("INSERT INTO galy_time_tables (hall_number, date, session, subcode, degree, subject, reg_no) VALUES ('".$i."', '".$date."', '".$session."', '".$subcode."', '".$students['degree']."', '".$students['subject']."', '".$students['reg_no']."')");    
                $a++;
                if($a > 15){
                    $i++;
                    $a = 1;
                }    
        }
    } 
}
*/
// $galies_time_tables = $db->query("select  * from galy_time_tables where date='.$date.'");
// $galies_time_tables = $galies_time_tables->fetch_all(MYSQLI_ASSOC);
// echo json_encode($galies_time_tables);
echo $date;
?>