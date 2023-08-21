<?php 
// Load the database configuration file 
include_once 'database/database.php'; 
 
// Get status message 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>galy</title>

<!-- Bootstrap library -->
<link rel="stylesheet" href="css/bootstrap.min.css">




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
<div class="row ">
<h1 style="text-align:center;" class="col-md-8">Galy</h1>
    <!-- Import link -->
    <div class="col-md-4 head">
        <div class="float-end">
            <a href="javascript:void(0);" class="btn btn-success" onclick="formToggle('importFrm');"><i class="plus"></i> Import Excel</a>
        </div>
    </div>
    <!-- Excel file upload form -->
    <div class="col-md-12" id="importFrm" style="display: none;">
        <form class="row g-3" action="importGaly.php" method="post" enctype="multipart/form-data">
            <div class="col-auto">
                <label for="fileInput" class="visually-hidden">Import Galy</label>
                <input type="file" class="form-control" name="file" id="fileInput" />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary mb-3" name="importSubmit" value="Import">
            </div>
        </form>
    </div>

    <!-- Data list table --> 
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>term</th>
                <th>degree</th>
                <th>batch</th>
                <th>centre</th>
                <th>subject</th>
                <th>subcode</th>
                <th>regNo</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        // Get member rows 
        $result = $db->query("SELECT * FROM galies ORDER BY reg_no DESC"); 
        if($result->num_rows > 0){ $i=0; 
            while($row = $result->fetch_assoc()){ $i++; 
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['term']; ?></td>
                <td><?php echo $row['degree']; ?></td>
                <td><?php echo $row['batch']; ?></td>
                <td><?php echo $row['centre']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['subcode']; ?></td>
                <td><?php echo $row['reg_no']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="8">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
