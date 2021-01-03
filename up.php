<?php
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if(isset($_POST['up']))
    {
        $id=$_POST['id'];
        $fname=$_POST['fn'];
        $lname=$_POST['ln'];
        $email=$_POST['email'];
        $doc=$_POST['doc'];
        $cont=$_POST['cont'];
        $statut=$_POST['statut'];
        $update = $bdd->query("update docapp set fname ='$fname' ,lname ='$lname' ,email ='$email' ,
        contact ='$cont' ,doctorapp ='$doc' ,statut ='$statut' where id_app = $id"
        );
        if( $update )
        {
        echo"<script>alert('Appointment updated')</script>";
        echo"<script>window.open('Patient_Details.php','_self')</script>";
       }
       else
       {  echo "ERROR"; }
    }
?>
