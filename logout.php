

<?php
include("connect.php"); // On se connecte à la base
?>

<?php

session_start();

if( $_SESSION['login'] == TRUE){
    session_unset();
    session_destroy();
}

header ('Location: index.php');








// foreach($line as $user){

//     if($user==$_POST['username'] AND $)
// }



?>
