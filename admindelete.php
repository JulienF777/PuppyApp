

<?php
include("connect.php"); // On se connecte à la base
session_start();

if($_SESSION['user']['user'] != 'admin'){
    header ('Location: index.php');
  }

$userid = $_POST['id'];

echo "
<h1>Warning! You are about to delete this user super account!</h1>
<h2>Are you sure you want to continue ?</h2>
";



?>

<form action='admindeleteT.php' method='POST'>
  
<?php
echo "<input type='hidden' name='id' value=".$userid.">"
?>

<input type='submit' value='delete account' name='deletebutton'></form>

</form>

<a href="index.php">Go Back</a>

<style>
    form{
        display: flex;
        flex-direction: column;
        width: 20%;
    }
</style>
