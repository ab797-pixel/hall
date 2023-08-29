<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>short hall</title>
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
       
    </thead>
    <tbody >
        <?php
         include_once "../database/database.php";
         @$date=$_GET['date'];
         @$session=$_GET['session'];
         @$hall=$_GET['hall'];
         for($i=1;$i<=$hall;$i++){
    
        //  $class_hall = $db->query("select * from galy_time_tables where date='$date' and session='$session'  group by hall_number");
        //  $class_hall = $class_hall->fetch_all(MYSQLI_ASSOC);
        //  echo json_encode($class_hall);
         
        
        ?>

       
        <tr>
            <th>Date</th><td><?php echo $date?></td><th>Hall</th><td colspan='2'><centre> <b><?php echo $i?></b><centre></td> 
        </tr>
        <tr>
        <th>Session</th><td><?php echo $session?></td><th style="width:20%">name of the Invigilator</th><td  colspan='2'></td> 
        </tr>
       
        <tr style="text-align=center">
            <th><b>S.NO.</b></th>
            <th><b>DEGREE/CODE</b></th>
            <th><b>REGISTER NUMBER</b></th>
            <th><b>PRESENT/ ABSENT</b></th>
            <th><b>STUDENT TOTAL</b></th>
        </tr>
        
   <!-- <?php //$i=1 ?> -->
      
      <?php
       $sireal=1 ;
       $students = $db->query("select * from galy_time_tables where date='$date' and session='$session' and hall_number='$i' ");
      $students = $students->fetch_all(MYSQLI_ASSOC);
       foreach($students as $student){
      ?>


        <tr style="text-align=center">
          <td><b><?php echo $sireal?></b></td>
           <td><b><?php echo $student['degree']?>/<?php echo $student['subject']?>/<?php echo $student['subcode']?></b></td> 
          <td><b><?php echo $student['reg_no']?></b></td>
          <td><b></b></td>
          <td><b></b></td>
        </tr>
          <?php $sireal++ ?>
      
       
        <!-- <div class="row">
            <div class="col-4">No. of Present</div>
            <div class="col-4">No. of Absentees</div>
            <div class="col-4">Total No. of Candidates</div>
        </div>
        <div class="row">
            <div class="col-6">Signature of the Invigilator with date</div>
            <div class="col-6">Signature of the Chief Superintendent</div>
        </div> -->
    <?php
    }
    ?>
        <tr>
            <td>No. of Present</td>
            <td></td>
            <td style="border-bottom:none;"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>No. of Absentees</td>
            <td></td>
            <td style="border-bottom:0px;"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total No. of Candidates</td>
            <td></td>
            <td>Signature of the Invigilator with date</td>
            <td></td>
            <td>Signature of the Chief Superintendent</td>
        </tr>
        </tbody>
        <?php
         }
    ?>
    
</table> 

    </body>
</html>


