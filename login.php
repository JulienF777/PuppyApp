

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
    <input type="radio" name="sex" value="Male"/>Male</td>  
    <input type="radio" name="sex" value="Female"/>Female</td></tr>  
    <input type="text" name="password" placeholder="password" required>
    <input type="submit">

</form>

</html>