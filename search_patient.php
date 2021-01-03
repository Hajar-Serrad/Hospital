<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient You Are Searching For</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<?php
include("func.php");
if(isset($_POST['patient_search']))
{
    $fname=$_POST['search'];
    $lname=$_POST['search'];
    $cont=$_POST['search'];
    $query="select * from docapp where fname = '$fname' or lname = '$lname' or contact = '$cont' ";
    $result=$bdd->query($query);
    if( $result->rowCount()>0)
    {
        echo"<div class='container-fluid'>";
        echo"<div class='card'> <img src='images/6.jpg' class='card-img-top' style='margin:30px;'>
        <div class='card-body' style='background-color:#3498D8;color:#ffffff;'>
        <div class='card-body'><a href='Patient_Details.php' class='btn btn-light'>Go Back</a></div>
        <table class='table table-hover'>
        <thead>
          <tr>
            <th scope='col'>First Name</th>
            <th scope='col'>Last Name</th>
            <th scope='col'>Email id</th>
            <th scope='col'>Contact</th>
            <th scope='col'>Doctor Appointment</th>
          </tr>
        </thead>
        <tbody>
        ";
        
        foreach($result as $res)
        {
          $fname=$res['fname'];
          $lname=$res['lname'];
          $email=$res['email'];
          $cont=$res['contact'];
          $docapp=$res['doctorapp'];
          echo"<tr>
          <td>$fname</td>
          <td>$lname</td>
          <td>$email</td>
          <td>$cont</td>
          <td>$docapp</td>
          </tr>"; 
    
        }
        echo"</tbody></table></div></div></div>";
    }
    else
    {
        echo"<script>alert('Patient Unfound')</script>";
        echo"<script>window.open('Patient_Details.php','_self')</script>";
    }
}

?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>