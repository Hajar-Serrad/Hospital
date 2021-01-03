<?php
    require("func.php");
    
if(isset($_POST['update']))
{
 
 $id=$_POST['id'];
 
     echo '<!DOCTYPE html>
     <html lang="en">
     <head>
         <title>Update Doctor</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         
     </head>
     <body>
         <div class="container-fluid" style="hight: 1200px; margin-top:100px;">
             <div class="card" >
                       <div class="card-body" style="background-color:#3498D8;color:#ffffff;">
                         <h4>Enter The New Informations</h4>
                       </div>
                       <div class="card-body" >
                        <form action= "up2.php" method="post"> 
                             <input type="hidden" name="id" value="'.$id.'"
                              >          
                             <label>First Name :</label>
                             <input type="text" name="fn" class="form-control" placeholder="enter the new First Name"><br>
                             <label>Last Name :</label>
                             <input type="text" name="ln" class="form-control" placeholder="enter the new Last Name"><br>
                             <label>Email id :</label>
                             <input type="email" name="email" class="form-control" placeholder="enter the new Email"><br>
                             <label>Contact :</label>
                             <input type="tel" name="cont" class="form-control" placeholder="enter the new Contact"><br>
                             <hr>
           <br>
           <button type="submit" class="btn btn-primary" name="up">Update</button>
            <button class="btn btn-dark" ><a href="Doctor_Section.php">Go Back</a></button>
           </div>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
         integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
         crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     </body>
     </html>';
    
 }
?>