

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
<html>
<form action="loginT.php" method="POST">
    login
    <input type="text" name="email" placeholder="email">
    <input type="text" name="password" placeholder="password">
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