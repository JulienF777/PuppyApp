<?php

include("connect.php");

// Get the user ID from the URL
$iduser = $_POST["id"];

$sql = "SELECT * FROM users WHERE id LIKE ?";
$q = $pdo->prepare($sql);
$q->execute(array("%$iduser"));

$user = $q->fetch(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

var_dump($user); 

//show selected user data
echo "
<h1> User ".$user['name']." Data </h1>
<table>
<tr>
  <td>Name</td>
  <td>".$user['name']."</td>
  <td></td>
</tr>
<tr>
  <td>Email</td>
  <td>".$user['email']."</td>
</tr>
<tr>
  <td>Type</td>
  <td>".$user['user']."</td>
</tr>
<tr>
  <td>Birthdate</td>
  <td>".$user['birthdate']."</td>
</tr>
<tr>
  <td>Password</td>
  <td><input type='password' value='".$user['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
</tr>
</table>

<form action='adminedit.php' method='POST'><input type='hidden' name='id' value=".$iduser."><input type='submit' value='edit' name='editbutton'></form>

<form action='admindelete.php' method='POST'><input type='hidden' name='id' value=".$iduser."><input type='submit' value='delete' name='deletebutton'></form>


";



?>
<a href="index.php">Go Back</a>
