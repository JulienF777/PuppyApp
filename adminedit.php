<?php
include("connect.php"); // On se connecte à la base
session_start();

//select the user to modify by id
$iduser = $_POST["id"];

$sql = "SELECT * FROM users WHERE id LIKE ?";
$q = $pdo->prepare($sql);
$q->execute(array("%$iduser"));

$user = $q->fetch(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

echo "
<h1> User ".$user['name']."</h1>
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

";

?>

<h1>Edit the informations you want to change.</h1>

<form action="admineditT.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $iduser; ?>">
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
