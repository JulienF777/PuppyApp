<?php
include("connect.php"); // On se connecte à la base
session_start();

//select the user to modify by id
$iduser = $_POST["id"];

$sql = "SELECT * FROM users WHERE id LIKE ?";
$q = $pdo->prepare($sql);
$q->execute(array("%$iduser"));

$user = $q->fetch(PDO::FETCH_ASSOC); // Fetch all rows as an associative array


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
echo "<h1 class='hello'> User ".$user['name']." </h1>
<table class='table'>
<tr>
  <th>Name</th>
  <td>".$user['name']."</td>
</tr>
<tr>
  <th>Email</th>
  <td>".$user['email']."</td>
</tr>
<tr>
  <th>Type</th>
  <td>".$user['user']."</td>
</tr>
<tr>
  <th>Birthdate</th>
  <td>".$user['birthdate']."</td>
</tr>
<tr>
  <th>Password</th>
  <td><input type='password' value='".$user['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
</tr>
</table>

";

?>

<h1 class='title'>Edit the informations you want to change</h1>

<form action="admineditT.php" method="POST" class="card card-edit">
    <input type="hidden" name="id" value="<?php echo $iduser; ?>" class="mb-3 birthdate">
    <input type="text" name="name" placeholder="new name" class="mb-3 birthdate">
    <input type="text" name="email" placeholder="new email" class="mb-3 birthdate">
    <input type="date" name="birthdate" value="birthdate" class="mb-3 birthdate">  
    <input type="text" name="password" placeholder="new password" class="mb-3 birthdate">
    <input type="submit" class='btn btn-outline-secondary btn-pink'>
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
