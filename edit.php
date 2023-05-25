

<?php
include("connect.php"); // On se connecte à la base
session_start();

if(isset($_SESSION['erroredit'])){
  echo $_SESSION['erroredit'];
}
?>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=ISO8859-1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Bootstrap core CSS -->
      <link href="bootstrap413/css/bootstrap.min.css" rel="stylesheet">
  
      <!-- Custom styles for this template -->
      <link href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
  </head>
  
  <body>
      
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand navbar-brand-login" href="#">
        <img src="images/logo_puppyapp.png" alt="Logo" width="100" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
  
  <?php
echo "<h1 class='title'>Account informations</h1>
<table class='table'>
<tr>
  <th>Name</th>
  <td>".$_SESSION['user']['name']."</td>
</tr>
<tr>
  <th>Email</th>
  <td>".$_SESSION['user']['email']."</td>
</tr>
<tr>
  <th>Type</th>
  <td>".$_SESSION['user']['user']."</td>
</tr>
<tr>
  <th>Birthdate</th>
  <td>".$_SESSION['user']['birthdate']."</td>
</tr>
<tr>
  <th>Password</th>
  <td><input type='password' value='".$_SESSION['user']['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
</tr>


</table>

";

?>

<h1 class='title'>Edit the informations you want to change</h1>

<form action="editT.php" method="POST" class="card card-edit">

<div class="form-floating mb-3">
    <input type="text" name="name" placeholder="new name" id="floatingInput" class="form-control">
    <label for="floatingInput">New name</label>
</div>

<div class="form-floating mb-3">
    <input type="text" name="email" placeholder="new email" id="floatingInput" class="form-control">
    <label for="floatingInput">New email address</label>
</div>

    <input type="date" name="birthdate" value="birthdate" class="mb-3 birthdate"> 
    
<div class="form-floating mb-3">
    <input type="text" name="password" placeholder="new password" id="floatingInput" class="form-control">
    <label for="floatingPassword">New password</label>
</div>

    <input type="submit" value='Validate' class='btn btn-outline-secondary btn-pink' id="floatingInput" class="form-control">
</form>


<div class="back">
  <a href="index.php" class="btn btn-secondary btn-lg">Go Back</a>
</div>

<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>

<style>
    form{
        display: flex;
        flex-direction: column;
        width: 20%;
    }
</style>
