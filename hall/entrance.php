<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrance hall</title>
    <script type="text/javascript">
       
    </script>
    <style>
        
    </style>
<link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
   
     <link href="/css/bootstrap.min.css" rel="stylesheet">
     <script src="/js/jquery/jquery.min.js"></script>

     <script src="/js/bootstrap.bundle.js"></script>
</head>
    <body>
        
 <table class="table table-bordered" style="width:100%">
    <thead>
    <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align:center">BHARATHIDASAN UNIVERSITY EXAMINATIONS - NOV. 2017</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 style="text-align:center">THIRU.VI.KA.GOVT.ARTS COLLEGE, THIRUVARUR (023)</h1>
            </div>
        </div>
    </thead><?php
        @$date = $_GET['date'];
        @$session = $_GET['session'];
        @$hall = $_GET['hall'];
    ?>

    <tr style="text-align:center">
            <th>Date</th>
            <th></th>
            <th></th>
            <th>Session</th>

    </tr>
    <tr style="text-align:center">
            <th><?php echo $date?></th>
            <th></th>
            <th></th>
            <th><?php echo $session?></th>
        </tr>
        <tr style="text-align:center">
            <td><b>DEGREE \ CODE</b></td>
            <td colspan="2"><b>REGISTER NUMBER OF ALLOTED CANDIDATES</b></td>
            
            <td><b>HALL   NUMBER</b></td>
        </tr>
        <?php
        include_once "../database/database.php";
        
         $subjects = $db->query("select distinct subject , hall_number from galy_time_tables where date = '$date' and session = '$session'");
         $subjects = $subjects->fetch_all(MYSQLI_ASSOC);
  
         foreach($subjects as $item){
           // echo json_encode($item)."<br>";
            $subject = $item['subject'];
            $hall = $item['hall_number'];
            //echo json_encode($item)."<br>"; 
            $first_row = $db->query("select * from galy_time_tables where date = '$date' and session = '$session' and subject ='$subject' and  hall_number = '$hall' order by  id asc limit 1 ");
            $first_row  = $first_row->fetch_array(MYSQLI_ASSOC);
            $last_row =   $db->query("select * from galy_time_tables where date = '$date' and session = '$session' and subject ='$subject'  and hall_number = '$hall' order by id desc limit 1 ");
            $last_row = $last_row->fetch_array(MYSQLI_ASSOC);
            $halls = array(
                  "first_row" => $first_row,
                  "last_row"  => $last_row
           );
              foreach($halls as $row=>$student){
               // echo json_encode($halls);
              }
        ?>
        
    
        <tr style="text-align:center;">
            <td><b><?php echo json_encode($halls['first_row']['subject'])?> \<?php  echo json_encode($halls['first_row']['subcode'])?>\<?php  echo json_encode($halls['first_row']['degree'])?></b></td>
            <td colspan="2"><b><?php echo json_encode($halls['first_row']['reg_no']) ?> TO <?php echo json_encode($halls['last_row']['reg_no'])?></b></td>
            
            <td><b><?php echo $hall; ?></b></td>
        </tr>
        
    <?php
        
      }
       // echo json_encode($subject)."<br>";
   
    ?>
      
        
 
        

    

       
</table> 

    </body>
</html>


