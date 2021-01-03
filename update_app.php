<!DOCTYPE html>
<html>
 <head>
	<title>Update Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
  <div class="jumbotron" style="background:url('images/6.jpg') no-repeat;background-size:cover;height:500px"></div>  

  <div class="container-fluid" >
  <div class="card">
  <legend class="form-control" style="background-color:#000000; color:#ffffff;"> 
  <?php  
    $id=$_GET["id"];
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $find=$bdd->query("select * from docapp where id_app=$id"
    );
    foreach($find as $value)
    {
        $fn=$value['fname'];
        $ln=$value['lname'];
        $statut=$value['statut'];
        $doc=$value['doctorapp'];
        echo "Mr/Mr $fn $ln has an appointment with Mr/Ms $doc";
    }
    ?> 
  </legend>
  <div class="card-body" style="background-color:#77B5FE; color:#ffffff;">
   <form class="form-group" action="update.php" method="post">
   <legend class="form-control"> Are you sure you want update this appointment ?</legend>
     <input type="hidden" name="id" value=" 
       <?php  
          echo $id; 
        ?> 
    ">
     
    <br>
    <button type="submit" class="btn btn-primary" name="update">Yes</button>
     <button class="btn btn-dark" ><a href="Patient_details.php">No</a></button>
   </form>
  </div>
  </div>
  </div>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 </body>
</html>