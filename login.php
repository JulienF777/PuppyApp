

<?php

session_start(); // Start the session

if(isset($_SESSION['login']) && $_SESSION['login'] != false){
  header('Location: index.php');
  exit;
} else {  
  // Display login form or error message
  echo "";
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
if(isset($_SESSION['error'])){
  echo "<h3>".$_SESSION['error']."</h3>";
}

?>
<div class="two-cards">
  
<form action="loginT.php" method="POST">

<div class="card" style="width: 18rem;">
    <h2>Login</h2>
    <div class="form-floating mb-3">
      <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <input type="submit" class="btn btn-outline-secondary btn-pink">
</div>

</form>

<form action="create.php" method="POST">

<div class="card" style="width: 18rem;">
    <h2>Signin</h2>
    <div class="form-floating mb-3">
      <input type="text" name="name" required class="form-control" id="floatingName" placeholder="name">
      <label for="floatingName">Name</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" name="email" required class="form-control" id="floatingEmail" placeholder="name@example.com">
      <label for="floatingEmail">Email address</label>
    </div>

    <input type="date" name="birthdate" value="birthdate" class="mb-3 birthdate"/>
    
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="p1" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating mb-3">
      <input type="password" name="confirm_password" class="form-control" id="p2" placeholder="Confirm Password">
      <label for="confirm_password">Confirm password</label>
    </div>

    <input type="submit" class="btn btn-outline-secondary btn-pink">
  </div>
</form>

<script>
  var password = document.getElementById("p1");
  var confirm_password = document.getElementById("p2");

  function validatePassword() {
    if (password.value !== confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>



</body>

</html>