<?php
include("connect.php"); // On se connecte à la base

$id = $_POST['id'];

$sql = "DELETE FROM users WHERE id = ?"; // La requête
$q = $pdo->prepare($sql);
$q->execute(array($id));

header('Location: index.php');
?>