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
        $subjects = $db->query("select * from galy_time_tables where date = '$date' and session = '$session' group by subject order by degree");
        $subjects = $subjects->fetch_all(MYSQLI_ASSOC);
        foreach($subjects as $subject=>$halls){
            $subject = $halls['subject'];
            $halls = $db->query("select * from galy_time_tables where date = '$date' and session = '$session' and subject = '$subject' ");
            $halls = $halls->fetch_all(MYSQLI_ASSOC);
            foreach($halls as $hall=>$students){
                $hall = $students['hall_number'];
                 $last
                
                // $entrance_tables[$subject][$hall]=array(
                //     "first" => $first_reg,
                //     "last"  => $second_reg,
                // );


         
        ?>
        
        <!-- <tr style="text-align:center;">
            <td><b>{{$hall['first']->subject}}\{{$hall['first']->subcode}}\{{$hall['first']->degree}}</b></td>
            <td colspan="2"><b>{{$hall['first']->reg_no}} TO {{$hall['last']->reg_no}}</b></td>
            
            <td><b>{{$hall['first']->hall_number}}</b></td>
        </tr> -->
        <tr style="text-align:center;">
            <td><b><?php echo $students['subject']?> \<?php  echo $students['subcode']?>\<?php  echo $students['degree']?></b></td>
            <td colspan="2"><b><?php echo $students['reg_no'] ?> TO </b></td>
            
            <td><b><?php echo $students['hall_number']; ?></b></td>
        </tr>
        
    <?php
       }
       // echo json_encode($subject)."<br>";

    }
    ?>
      
        
 
        

    

       
</table> 

    </body>
</html>


