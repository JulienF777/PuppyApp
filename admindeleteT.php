<?php
include("connect.php"); // On se connecte à la base

if($_SESSION['user']['user'] != 'admin'){
    header ('Location: index.php');
  }

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id = ?"; // La requête
$q = $pdo->prepare($sql);
$q->execute(array($id));

header('Location: index.php');
?>