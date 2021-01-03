<?php
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(isset($_POST['delete']))
{
 
   $id=$_POST['id'];
 
     
    
    $delete=$bdd->query("delete from doctors where id_doc=$id");
    
    if($delete)
      {  
        echo"<script>alert('Doctor deleted')</script>";
        echo"<script>window.open('Doctor_Section.php','_self')</script>";
       }
    else
       {  echo "ERROR"; }
    
    
 }
 
   
?>