

<?php
include("connect.php"); // connect to the database

//if user is already connected, disconnect the user so that it can be logged in as the created user.
session_start();
if( $_SESSION['login'] == TRUE){
    session_unset();
    session_destroy();
}

// user creation inputs.
$usercreate = $_POST['email'];
$passwordcreate = $_POST['password'];
$namecreate = $_POST['name'];
$birthdate = $_POST['birthdate'];

// we need to verify the sent inputs to protect against SQL injections !
// filter var.


//function to clean special characters from the name of the user
function clean($string) {
    $string = str_replace(' ', '-', $string);
 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
 }
clean($namecreate);

// Create the new users in the database
$sql = "INSERT INTO users (name, email, birthdate, password) VALUES ('$namecreate','$usercreate','$birthdate','$passwordcreate');"; // La requête
$q = $pdo->prepare($sql);
$q->execute();

//retrieve the user ID that was created, make it a 4 digit number and update it in the database.
$userID = $pdo->lastInsertId();
$userNumber = mt_rand(1111,9999);
$sql = "UPDATE users SET number = '$userNumber' WHERE id = '$userID';";
$q = $pdo->prepare($sql);
$q->execute();


//Make the user connected
$_SESSION['login'] = TRUE;
$_SESSION['email'] = $usercreate;
$email = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email LIKE ?"; 
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));
            while($line=$q->fetch()) {

               var_dump($line);
               $_SESSION['user'] = $line;
            }
//go back to the main page
header ('Location: index.php');
?>
