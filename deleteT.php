

<?php
include("connect.php"); // On se connecte à la base
?>

<?php

session_start();

        $email = $_SESSION['user']['email'];

        $sql = "DELETE FROM users WHERE email LIKE ?"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));
            while($line=$q->fetch()) {
        }

        session_unset();
        session_destroy();
        header ('Location: index.php');
        

// foreach($line as $user){
// if($user==$_POST['email'] AND $)
// }

?>
