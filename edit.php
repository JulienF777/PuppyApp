

<?php
include("connect.php"); // On se connecte à la base
session_start();

echo "
<h1>Account information</h1>
<table>
<tr>
  <td>Name</td>
  <td>".$_SESSION['user']['name']."</td>
  <td></td>
</tr>
<tr>
  <td>Email</td>
  <td>".$_SESSION['user']['email']."</td>
</tr>
<tr>
  <td>Type</td>
  <td>".$_SESSION['user']['user']."</td>
</tr>
<tr>
  <td>Sex</td>
  <td>".$_SESSION['user']['birthdate']."</td>
</tr>
<tr>
  <td>Password</td>
  <td><input type='password' value='".$_SESSION['user']['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
</tr>


</table>

";

?>

<h1>Edit the informations you want to change.</h1>

<form action="editT.php" method="POST">
   
    <input type="text" name="name" placeholder="new name">
    <input type="text" name="email" placeholder="new email">
    <input type="date" name="birthdate" value="birthdate">  
    <input type="text" name="password" placeholder="new password">
    <input type="submit">
</form>

<a href="index.php">Go Back</a>

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
