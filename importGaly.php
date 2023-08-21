<?php 
 
// Load the database configuration file 
include_once 'database/database.php'; 
 
// Include PhpSpreadsheet library autoloader 
require_once 'vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Reader\Xlsx; 
 
if(isset($_POST['importSubmit'])){ 
     
    // Allowed mime types 
    $excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     
    // Validate whether selected file is a Excel file 
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)){ 
         
        // If the file is uploaded 
        if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
            $reader = new Xlsx(); 
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']); 
            $worksheet = $spreadsheet->getActiveSheet();  
            $worksheet_arr = $worksheet->toArray(); 
 
            // Remove header row 
            unset($worksheet_arr[0]); 
 
            foreach($worksheet_arr as $row){ 
                $term = $row[0]; 
                $degree = $row[1]; 
                $batch = $row[2]; 
                $centre = $row[3]; 
                $subject = $row[4]; 
                $subcode = $row[5]; 
                $reg_no = $row[6];
 
                // Check whether member already exists in the database with the same email 
                // $prevQuery = "SELECT id FROM members WHERE email = '".$email."'"; 
                // $prevResult = $db->query($prevQuery); 
                 
                //if($prevResult->num_rows > 0){ 
                    // Update member data in the database 
                   // $db->query("UPDATE members SET first_name = '".$first_name."', last_name = '".$last_name."', email = '".$email."', phone = '".$phone."', status = '".$status."', modified = NOW() WHERE email = '".$email."'"); 
                //}else{ 
                    // Insert member data in the database 
                    $db->query("INSERT INTO galies (term, degree, batch, centre, subject, subcode, reg_no) VALUES ('".$term."', '".$degree."', '".$batch."', '".$centre."', '".$subject."', '".$subcode."', '".$reg_no."')"); 
               // } 
           // } 
             
            $qstring = '?status=succ'; 
       // }
        //else{ 
        //    $qstring = '?status=err'; 
        //} 
   // }else{ 
     //   $qstring = '?status=invalid_file'; 
       }
       }
    } 
} 
 
// Redirect to the listing page 
header("Location: index.php?info=galy"); 
 
?>
