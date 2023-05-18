

<?php
include("connect.php"); // On se connecte à la base
?>

<?php

session_start();

if( $_SESSION['login'] == TRUE){
    session_unset();
    session_destroy();
}

// user creation
$usercreate = $_POST['email'];
$passwordcreate = $_POST['password'];
$namecreate = $_POST['name'];
$birthdate = $_POST['birthdate'];

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }
clean($namecreate);


$sql = "INSERT INTO users (name, email, birthdate, password) VALUES ('$namecreate','$usercreate','$birthdate','$passwordcreate');"; // La requête
$q = $pdo->prepare($sql);
$q->execute();

$_SESSION['login'] = TRUE;
$_SESSION['email'] = $usercreate;

$email = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email LIKE ?"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));
            while($line=$q->fetch()) {

               var_dump($line);
               $_SESSION['user'] = $line;
        }

header ('Location: index.php');
// foreach($line as $user){
//     if($user==$_POST['email'] AND $)
// }
?>
