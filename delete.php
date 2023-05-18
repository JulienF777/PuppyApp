

<?php
include("connect.php"); // On se connecte à la base
session_start();

echo "
<h1>Warning! You are about to delete your super account!</h1>
<h2>Are you sure you want to continue ?</h2>
<h3>Please no</h3>
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
  <td>".$_SESSION['user']['sex']."</td>
</tr>
<tr>
  <td>Password</td>
  <td><input type='password' value='".$_SESSION['user']['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
</tr>


</table>

";

?>

<form action="deleteT.php" method="POST">

    <input type="submit" value="Delete my account">
</form>

<a href="index.php">Go Back</a>

<style>
    form{
        display: flex;
        flex-direction: column;
        width: 20%;
    }
</style>
