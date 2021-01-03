<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8','root',
               '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(isset($_POST['login_submit']))
{
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //$con=mysqli_connect("localhost","root","","hospital");
    $requete="select * from login where username = '$username' and password = '$password' ";
    $user = $bdd->query($requete);
    //$nb=$bdd->exec($requete); 
   //echo $nb;
   //$result=mysqli_query($con,$requete);
   /* if(mysqli_num_rows($result)!=1) */
    if(! ($user->fetch()))
    {
        echo"<script>alert('Your login or password is wrong, please check them')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    else
    {
        $_SESSION['username'] = $username ;
        header("Location:admin.php");
    }
}
if(isset($_POST['pat_submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $cont=$_POST['contact'];
    $docapp=$_POST['doc'];
    $statut=$_POST['statut'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $pat = $bdd->query("insert into docapp(fname,lname,email,contact,doctorapp,statut,date,time) 
    values('$fname','$lname','$email','$cont','$docapp','$statut','$date','$time')"
    );
    if($pat)
    {
        echo"<script>alert('Appointment registred.')</script>";
        echo"<script>window.open('admin.php','_self')</script>";
    }

}
if(isset($_POST['in']))
{
    $id=$_POST['id'];
    $fname=$_POST['fn'];
    $lname=$_POST['ln'];
    $email=$_POST['email'];
    $cont=$_POST['cont'];
    $doc = $bdd->query("insert into doctors 
    values('$id','$fname','$lname','$cont','$email',0)"
    );
    if($doc)
    {
        echo"<script>alert('Doctor Inserted.')</script>";
        echo"<script>window.open('Doctor_Section.php','_self')</script>";
    }

}

function get_pat_det(){
global $bdd;
$requete="select * from docapp";
$patients = $bdd->query($requete);
foreach($patients as $patient )
{
    $fname = $patient["fname"];
    $lname=$patient["lname"];
    $email=$patient["email"];
    $contact=$patient["contact"];
    $app=$patient["doctorapp"];
    $statut=$patient["statut"];
    $date=$patient["date"];
    $time=$patient["time"];
    $id=$patient["id_app"];
    $lien1= "update_app.php?id=".$id;
    $lien2= "delete_app.php?id=".$id;
    echo"<tr>
      <td>$fname</td>
      <td>$lname</td>
      <td>$email</td>
      <td>$contact</td>
      <td>$app</td>
      <td>$statut</td>
      <td>$date</td>
      <td>$time</td>
      
      
      <td> 
      <button type='button' class='btn btn-light'><a href=$lien1>Update Appointment</a></button></td>
      <td>    
      <button type='button' class='btn btn-dark'><a href=$lien2>Delete Appointment</a></button>
      </td>
      </tr>";   
} 

}
function display_docs()
{
global $bdd;
$requete="select fname from doctors";
$doctors = $bdd->query($requete);
foreach($doctors as $doc)
{
    $name=$doc["fname"];
    echo"<option value=$name>$name</option>";   
} 
}

function display_statut()
{
global $bdd;
$requete="select statut from payment";
$statut = $bdd->query($requete);
foreach($statut as $etat)
{
    $name=$etat["statut"];
    echo"<option value=$name>$name</option>";   
} 
}
 
function get_doc_det()
{
    global $bdd;
    $requete="select * from doctors";
    $doctors = $bdd->query($requete);
    foreach($doctors as $doc )
    {
        $id=$doc["id_doc"];
        $fname = $doc["fname"];
        $lname=$doc["lname"];
        $email=$doc["email"];
        $contact=$doc["contact"];
    
        $lien1= "update_doc.php?id=".$id;
        $lien2= "delete_doc.php?id=".$id;
        $lien3= "add_abs.php?id=".$id;
        echo"<tr>
          <td>$id</td>
          <td>$fname</td>
          <td>$lname</td>
          <td>$email</td>
          <td>$contact</td>
          
          
          <td> 
          <button type='button' class='btn btn-light'><a href=$lien1>Update Doctor</a></button></td>
          <td>    
          <button type='button' class='btn btn-info' style='background-color:#730800;'>
          <a href=$lien3>Add Absence</a></button>
          </td>
          <td>    
          <button type='button' class='btn btn-dark'><a href=$lien2>Delete Doctor</a></button>
          </td>
          </tr>";   
    } 
    
    }

function display_admin_panel()
{
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Main Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i><h3> The Huge Hospital </h3></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
           <li class="nav-item">
            <a class="nav-link" href="logout.php"><h5>Logout</h5></a>
          </li>
        </ul><b>
        <h5 style="color:#ffffff;"> 
         '.strftime("%H:%M:%S").'<br> '.strftime("%A %d %B %Y").
        '
        </h5></b>
      </div>
    </nav>
    </head>
    <body>
    <div class="jumbotron" style="background:url(\'images/7.jpg\') no-repeat;background-size:cover;height:700px"></div>  
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" 
          id="list-home-list" data-toggle="list" href="#list-home" role="tab" 
          aria-controls="home">Appointment</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" 
          data-toggle="list" href="Patient_Details.php"  role="tab" 
          aria-controls="profile">Patients Details</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" 
          data-toggle="list" href="Doctor_Section.php" role="tab" 
          aria-controls="settings">Doctors Section</a>
        </div>
      </div>
      <div class="col-md-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" 
          role="tabpanel" aria-labelledby="list-home-list">
          <div class="container-fluid">
          <div class="card">
                    <div class="card-body" style="background-color:#3498D8;color:#ffffff;">
                      <h4>Book an appointment</h4>
                    </div>
                    <div class="card-body" >
                      <form class="form-group" action="func.php" method="post">
                          <label>First Name :</label>
                          <input type="text" name="fname" class="form-control"><br>
                          <label>Last Name :</label>
                          <input type="text" name="lname" class="form-control"><br>
                    
                          <label>Email id :</label>
                          <input type="email" name="email" class="form-control"><br>
                    
                          <label>Contact :</label>
                          <input type="tel" name="contact" class="form-control"><br>
                          <label >Doctor Appointment :</label>
                          <select name="doc" class="form-control">';
                           display_docs();
                     echo '</select><br>
                          <label>Date-Time of the appointment :</label>
                          <div class="row">
                          <div class="col-md-6">
                          <input type="date" name="date" class="form-control"></div>
                          <div class="col-md-6">
                          <input type="time" name="time" class="form-control"></div></div><br>
                          <label >Payment :</label>
                          <select name="statut" class="form-control">';
                          display_statut();     
                     echo '</select><br><hr>
                          <input type="submit" name="pat_submit" class="btn btn-primary" value="Enter Appointment">              
                      </form><hr><hr>
                    </div>
                 </div>
                </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-profile" 
          role="tabpanel" aria-labelledby="list-profile-list">...</div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" 
          aria-labelledby="list-messages-list">...</div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" 
          aria-labelledby="list-settings-list">...</div>
        </div>
      </div>
    </div>
    </div>
    
    
    
    
    
    
    
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--Sweet alert js
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    swal({
      title: "Good job!",
      text: "You clicked the button!",
      icon: "success",
    });
    </script>
                      -->
    </body>
    </html>';
}

?>