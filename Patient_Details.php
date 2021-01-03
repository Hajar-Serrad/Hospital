<?php
 require_once("func.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="jumbotron" style="background:url('images/10.jpg') no-repeat;background-size:cover;height:600px"></div>  
<div class="container-fluid">
<div class="card">
                <div class="card-body" style="background-color:#77B5FE; color:#ffffff;">
                <div class="row">
                <div class="col-md-2">
                  <a href="admin.php" class="btn btn-secondary"><h4>Go Back</h4></a>
                  </div> 
                  <div class="col-md-1"></div>
                  <div class="col-md-3"><h2>Patient Details</h2></div>
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                      <form class="form-group" action="search_patient.php" method="post">
                      <div class="row">
                        <div class="col-md-9"><input type="text" name="search" class="form-control" 
                        placeholder="enter first name,last name or contact" ></div> 
                        <div class="col-md-3"><input type="submit" name="patient_search" value="Search" class="btn btn-light"></div></div>
                      </form>
                  </div>
                </div></div>
  <div class="card-body" style="background-color:#77B5FE; color:#ffffff;">
  <table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email id</th>
      <th scope="col">Contact</th>
      <th scope="col">Doctor Appointment</th>
      <th scope="col">Payment</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      get_pat_det();
    ?>
  </tbody>
</table>
</div>
</div>







<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>