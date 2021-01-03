<?php
include("func.php");
if(!isset($_SESSION['username']))
{
  echo"<script>alert('Session Expired.Try To Reconnect')</script>";
  echo"<script>window.open('index.php','_self')</script>";
}
else
   display_admin_panel();
?>