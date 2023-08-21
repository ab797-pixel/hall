<?php 
// Load the database configuration file 
include_once 'database/database.php'; 
 
// Get status message 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
    </style>
<meta charset="utf-8">
<title>Time Table</title>

<!-- Bootstrap library -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!--javA script library-->
<script src="js/jquery/jquery.min.js"></script>
       <script src="js/bootstrap.bundle.js"></script>




<!-- Show/hide Excel file upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}
</script>
</head>
<body>

<!-- Display status message -->


<!--<div class="row p-3">-->
<div class="row">

    <h1 style="text-align:center;" class="col-md-8">Time Table</h1>
    <!-- Import link -->
    <div class="col-md-4 head">
        <div class="float-end">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
        </div>
    </div>
    <!-- Excel file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form class="row g-3" action="importTimeTable.php" method="post" enctype="multipart/form-data">
            <div class="col-auto">
                <label for="fileInput" class="visually-hidden">Import Time Table</label>
                <input type="file" class="form-control" name="file" id="fileInput" />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>

    <!-- Data list table --> 
    <table class="table table-resposive table-bordered" style="border:1px solid black;">
    <thead class="sticky-top" class="dark">
        <tr style="font-size:20px;text-align:center;border:2px solid black;background-color: #EEA47F;color:white;">
            
            <th>Date</th>
            <th>session/subcode</th>
           
            <th>action</th>
        </tr>
        
        </thead><?php
        $results = $db->query("SELECT * FROM time_tables GROUP BY date"); 
        $time_tables = $results->fetch_all(MYSQLI_ASSOC);
        // echo $time_tables;
        // echo json_encode($time_tables);
        foreach($time_tables as $time_table){
        
        ?>
    
          
        <tr>
            
            <td class="align-middle"><b><?php  echo $time_table['date']?><b> </td>
            
             
             
             
             <td class="align-middle">
        
         
         <table class="table">

            <tr width="100%">
                <th>SESSIONS</th>
                <th>SUBCODES</th>
            </tr>
            <tr>
            <?php
            $date = $time_table['date'];
            $sessions = $db->query("SELECT * FROM time_tables WHERE date='$date'");
            $sessions = $sessions->fetch_all(MYSQLI_ASSOC);
            //echo json_encode($sessions);
            foreach($sessions as $session){
            ?>
                <td><?php echo $session['session'];?></td>
                <td>
                   <?php echo $session['subcode']?>
                </td>
            </tr>
            <?php
            }?>
        </table>
       
         
        
            </td>
            
             <td class="align-middle"   style="text-align:center;">
            
             <a class="btn btn-info"   onclick="create_hall('<?php echo $date?>')" id="<?php echo $date?>" >Create Hall</a>
             <div class="<?php echo $date?>" >
              <span class="visually-hidden">Loading...</span>
             </div>
            </td>
            
             
        </tr>
        
        <tbody>

       <?php
        }
       ?>
        
</tbody>
    
    
</table>


    <!-- <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>date</th>
                <th>day</th>
                <th>session</th>
                <th>subcode</th>
                <th>graduate</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        // Get member rows 
        $result = $db->query("SELECT * FROM time_tables ORDER BY date"); 
        if($result->num_rows > 0){ $i=0; 
            while($row = $result->fetch_assoc()){ $i++; 
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['session']; ?></td>
                <td><?php echo $row['subcode']; ?></td>
                <td><?php echo $row['graduate']; ?></td>
                <td class="align-middle"   style="text-align:center;">
                <?php
                $date = $row['date'];
                $session = $row['session'];
                //  echo $date;
                //  echo $session;
                ?>
             <a class="btn btn-info"   onclick="create_hall('<?php echo $date?>','<?php echo $session?>');" id="" >Create Hall</a>
             <div class="" >
              <span class="visually-hidden">Loading...</span>
             </div>
            </td>
                
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="6">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table> -->
</div>
<script>
     function create_hall(date){
     alert('hi '+date);
    $("#"+date).removeAttr("onclick").html("Hall creating...").css({'background-color':'aqua'});
    $("."+date).addClass("spinner-border text-primary").addClass("status");
    
    $.ajax({
        url:'hall/core.php',
        type:"post",
        data:   { 
            "date":date
        },
        datatype:'json',
        success: function(res){
            console.log(res);
        //     var date = res.date;
            
        //    $("#"+date).html("Hall Created")
        //               .css({'background-color':'green','font-size':'20px'})
        //               .removeAttr("onclick")
        //    $("."+date).removeClass("spinner-border text-primary")
        //               .removeClass("status");
          
        },
        error: function(err){
            alert('IMPORT GALY PROPERLY');
            console.log(err);
        },
    });
   
}
   

</script>

</body>

</html>
