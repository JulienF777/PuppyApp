

<?php
include("connect.php"); // On se connecte à la base
session_start();

if($_SESSION['user']['user'] != 'admin'){
    header ('Location: index.php');
  }

$userid = $_POST['id'];


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
echo "
<h1 class='title'>Warning! You are about to delete this user super account!</h1>
<h2 class='title'>Are you sure you want to continue ?</h2>
";



?>

<form action='admindeleteT.php' method='POST' style='width: 100%;'>
  
<?php
echo "<input type='hidden' name='id' value=".$userid.">"
?>

<input type='submit' value='delete account' name='deletebutton' class='btn btn-outline-secondary btn-pink btn-lg' style='margin: 0 auto;'></form>

</form>

<div class="back">
  <a href="user.php" class="btn btn-secondary btn-lg">Go Back</a>
</div>

<style>
    form{
        display: flex;
        flex-direction: column;
        width: 20%;
    }
</style>
