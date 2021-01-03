<?php
    $bdd = new PDO('mysql:host=localhost;dbname=hospital;
    charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if(isset($_POST['up']))
    {
        $id=$_POST['id'];
        $fname=$_POST['fn'];
        $lname=$_POST['ln'];
        $email=$_POST['email'];
        $cont=$_POST['cont'];
        $update = $bdd->query("update doctors set fname ='$fname' ,lname ='$lname' ,email ='$email' ,
        contact ='$cont' where id_doc = $id"
        );
        if( $update )
        {
        echo"<script>alert('Doctor Updated')</script>";
        echo"<script>window.open('Doctor_Section.php','_self')</script>";
       }
       else
       {  echo "ERROR"; }
    }
?>
