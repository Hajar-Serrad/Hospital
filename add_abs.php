<?php
$bdd = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8','root',
               '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(isset($_POST['abs']))
{
    $id = $_POST['id'];
    $date = $_POST['date'];
    $reason=$_POST['reason'];
    $query="insert into absences_doctors(id_doc,reason,date)
     values($id,'$reason','$date')";
    $abs = $bdd->query($query);

    if($abs)
    {
        echo"<script>alert('Absence Added')</script>";
        echo"<script>window.open('Doctor_Section.php','_self')</script>";
    }
    else
    {
        echo'ERROR';
    }
}

?>

<!DOCTYPE html>
<html>
 <head>
	<title>Add Absence</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>
 <body>
  <div class="jumbotron" style="background:url('images/6.jpg') no-repeat;background-size:cover;height:500px"></div>  

  <div class="container-fluid" >
  <div class="card">
  <legend class="form-control" style="background-color:#606060; color:#ffffff;"> 
  <?php  
    $id = $_GET["id"];
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $find=$bdd->query("select * from doctors where id_doc=$id"
    );
    foreach($find as $value)
    {
        $fn=$value['fname'];
        $ln=$value['lname'];
        echo "  ============================================ Add Absence To Doctor $fn $ln 
        num $id ============================================ ";
    }
    ?> 
  </legend>
  <div class="card-body" style="background-color:#606060; color:#ffffff;">
  
  <div class="col-md-8">
   <form class="form-group" action=" <?php  echo  $_SERVER['PHP_SELF'];  ?> "
         method="post" >
     <input type="hidden" name="id" value=" 
       <?php  
          echo $id; 
        ?> 
    ">
    
    <label> WHEN ? </label>
    <input type="date" name="date" class="form-control">
    <br>
    <label> WHY ? </label>
    <input type="text" name="reason" class="form-control" placeholder="please enter the reason of the absence">
    <br>
    <button type="submit" class="btn btn-primary" name="abs">Submit</button>
     <button class="btn btn-light" ><a href="Doctor_Section.php">Go Back</a></button>
   </form></div>
  </div>
  </div>
  </div>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 </body>
</html>