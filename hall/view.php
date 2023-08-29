<?php 
// Load the database configuration file 
include_once 'database/database.php'; 
 
// Get status message 

?>

<html lang="en">
<head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
    </style>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>hall</title>

<!-- Bootstrap library -->
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!--javascript library-->
    </head> 
    <!-- <script type="text/javascript" src="../js/jquery/jquery.min.js"></script>
       <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
       <script type="text/javascript" src="../js/popper.min.js"></script>-->
       
    <body>
<div class="row">
<div class="col-lg-12">
    <h1 style="text-align:center;">Hall</h1>
</div>
</div>
<table class="table table-resposive table-bordered" style="border:1px solid black;">
    <thead class="sticky-top" class="dark">
        <tr style="font-size:20px;text-align:center;border:2px solid black;background-color: #EEA47F;color:white;">
            
            <th>Date</th>
            <th>Session</th>
            <th>B SC</th>
            <th>B.COM</th>
            <th>BBA</th> 
            <th>BA</th>
            <th>Total</th>
            <th>Total Hall</th>
            <th>Action</th>
        </tr>
        </thead>
           <?php
             $dates = $db->query("select distinct date from galy_time_tables order by date");
             $dates = $dates->fetch_all(MYSQLI_ASSOC);
             foreach($dates as $date){
               
                $date = $date['date'];
                $sessions = $db->query("select distinct session from galy_time_tables where date='$date'");
                $sessions = $sessions->fetch_all(MYSQLI_ASSOC);
                foreach($sessions as $session){
                     $session = $session['session'];
                     $bsc = $db->query("select * from galy_time_tables where date = '$date' and session ='$session' and degree='B.Sc.'");
                     $bsc = $bsc->fetch_all();
                     $bsc = count($bsc);
                     $ba = $db->query("select * from galy_time_tables where date = '$date' and session ='$session' and degree='B.A.'");
                     $ba = $ba->fetch_all();
                     $ba = count($ba);
                     $bcom = $db->query("select * from galy_time_tables where date = '$date' and session ='$session' and degree='B.Com.'");
                     $bcom = $bcom->fetch_all();
                     $bcom = count($bcom);
                     $bba = $db->query("select * from galy_time_tables where date = '$date' and session ='$session' and degree='BBA'");
                     $bba = $bba->fetch_all();
                     $bba = count($bba);
                     $total = $ba+$bba+$bcom+$bsc;
                    // $hall = GalyTimeTable::where('date','=',$date)->where('session','=',$session)->count()/30;
                    $hall = $db->query("select * from galy_time_tables where date= '$date' and session='$session'");
                    $hall = $hall->fetch_all();
                    $hall = count($hall)/30;

                     $fraction = $hall - floor($hall);
                
                     if($fraction < 0.5){
                        $hall = $hall + 1;
                     }
                
           ?>
       
        <tr style="text-align:center;">
            
            <td class="align-middle"><?php  echo $date?></td>
            <td class="align-middle"><?php  echo $session ?></td>
            <td class="align-middle"><?php  echo $bsc?></td>
            <td class="align-middle"><?php  echo $bcom ?></td>
            <td class="align-middle"><?php  echo $bba ?></td>
            <td class="align-middle"><?php  echo $ba?></td>
            <td class="align-middle"><?php  echo $total?> </td>
            <td class="align-middle"><?php  echo round($hall)?> </td>
            <td class="align-middle">
          <!-- Example single danger button -->
          <div class="dropdown">
                   <button type="button" class="btn btn-info dropdown-toggle" id="hall" data-bs-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                     Action
                   </button>
                   <div class="dropdown-menu" aria-labelledby="hall">
                     <a class="dropdown-item" href="hall/class_hall.php?date=<?php echo$date?>&&session=<?php echo$session?>&&hall=<?php echo round($hall)?>">Class Hall</a>
                     <a class="dropdown-item" href="hall/entrance.php?date=<?php echo$date?>&&session=<?php echo$session?>&&hall=<?php echo round($hall)?>">Entrance</a>
                     <a class="dropdown-item" href="hall/attendance.php?date=<?php echo$date?>&&session=<?php echo$session?>&&hall=<?php echo round($hall)?>">attendance hall</a>
                     <a class="dropdown-item" href="hall/present_absent.php?date=<?php echo$date?>&&session=<?php echo$session?>&&hall=<?php echo round($hall)?>">present/absent</a>
                   </div>
           </div>

            </td>
         </tr>
         <?php
                }
                
         }?>
       
        
        <tbody>

       
        
</tbody>
    
    
</table>
    </body>
    </html>
<!-- <script type="text/javascript">
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
   });
   $(document).ready(function(){
    $.ajax({
        url:'hall/index',
        type:"get",
        datatype:'json',
        success: function(date){
           
        },
        error: function(err){
            alert("Click 'Create Hall'");
        },
    });
   });
  </script> -->


