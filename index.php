<html>
    <head>
        <title>Hall Allocate</title>
        <!--meta data-->
         <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--style css-->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
      <!--  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">-->
   
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <!-- script js-->
       <script src="js/jquery/jquery.min.js"></script>
       <script src="js/bootstrap.bundle.js"></script>
        <style>
            
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color:#FF00FF">Hall Allocate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
      <li class="nav-item dropdown">
          <a class="nav-link" href="index.php?info=college_details" style="color:red"> College Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" style="color:red" href="index.php?info=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?info=galy" style="color:red">Galy</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="index.php?info=time_table" style="color:red">Time Table</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="index.php?info=hall" style="color:red"> Hall </a>
        </li>
        
       
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<?php 
					@$info=$_GET['info'];
					if($info!="")
					{
											
						 if($info=="galy")
						 {
						 include('galy/view.php');
						 }
                        else if($info=="time_table")
						 {
						 include('time_table/view.php');
						 }
                        else if($info=="hall")
						 {
						 include('hall/view.php');
						 }
                         else if($info=="home")
						 {
						 include('home.php');
						 }
            else if($info=="college_details")
						 {
						 include('college_detail.php');
						 }
                    }
                  
    ?>
  

    </body>
</html>