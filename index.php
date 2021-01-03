<!DOCTYPE html>
<html >
<head>
    <title>Connection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style type="text/css">
    #ab1:hover{cursor:pointer;}
</style>
<body style="background:url('images/6.jpg') no-repeat; background-size:cover;">
  <div class="container" style="width: 600px; margin-top:200px;">
  <div class="card">
  <img src="images/6.jpg" class="card-img-top">
  <div class="card-body">
      <form class="form-group" action="func.php" method="post">
          <label> Username :</label><br>
          <input type="text" name="user" class="form-control" placeholder="enter username"><br>
          <label> Password :</label><br>
          <input type="password" name="pass" class="form-control" placeholder="enter password"><br>
          <input type="submit" name="login_submit" value="Connect" id="ab1" class="btn btn-primary">


      </form>
  </div>
  </div>
 </div>
 
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--Sweet alert js
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
($document).ready(function(){
swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
});});
</script>
-->
</body>
</html>