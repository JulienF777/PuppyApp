

<?php

session_start(); // Start the session

if(isset($_SESSION['login']) && $_SESSION['login'] != false){
  header('Location: index.php');
  exit;
} else {  
  // Display login form or error message
  echo "Welcome to the Super App, please login or create an account";

  
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
    <link href="bootstrap-5.3.0-alpha-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>

  
<form action="loginT.php" method="POST" class="form-floating">

    Login
      <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>

      <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>

    <input type="submit">
</form>

<form action="create.php" method="POST">
    create an account
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="email" placeholder="email" required>
    <input type="date" name="birthdate" value="birthdate"/>
    <input type="password" name="password" placeholder="Password" id="password" required>
    <input type="password" placeholder="Confirm Password" id="confirm_password" required>
    <input type="submit">

</form>

<script>
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</html>