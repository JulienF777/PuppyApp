<?php
include("connect.php"); // On se connecte à la base
?>

<?php
session_start();

var_dump($_POST);
// user update
$userid = $_POST["id"];
$enabled = $_POST['enabled'];

$sql = "UPDATE users SET enabled=? WHERE id=?";
$q = $pdo->prepare($sql);
$q->execute([$enabled,$userid]); 
// Pass the parameters as an array

//Update the session to the new values

header ('Location: index.php');
?>
