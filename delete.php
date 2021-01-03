<?php
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(isset($_POST['delete']))
{
 
 $id=$_POST['id'];
 
     
    
    $delete=$bdd->query("delete from docapp where id_app=$id");
    
    if($delete)
      {  
        echo"<script>alert('Appointment deleted')</script>";
        echo"<script>window.open('Patient_Details.php','_self')</script>";
       }
    else
       {  echo "ERROR"; }
    
    
 }
 
   
?>