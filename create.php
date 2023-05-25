

<?php
include("connect.php"); // connect to the database

//if user is already connected, disconnect the user so that it can be logged in as the created user.
session_start();
if( $_SESSION['login'] == TRUE){
    session_unset();
    session_destroy();
}

// user creation inputs. check that email is valid
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $usercreate = $_POST['email'];
  } else {
    $_SESSION['error'] = 'Email is not valid';
    header ('Location: index.php');
  }

$passwordcreate = $_POST['password'];

$namecreate = $_POST['name'];
//function to clean special characters from the name of the user
function clean($string) {
    $string = str_replace(' ', '-', $string);
 
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
 }
clean($namecreate);

$birthdate = $_POST['birthdate'];

// we need to verify the sent inputs to protect against SQL injections !
// filter var.




// check if the email is unique
$sql = "SELECT id FROM users WHERE email = ?;"; // La requête
$q = $pdo->prepare($sql);
$q->execute([$usercreate]);
if($q->fetchAll() != NULL){
    // email not unique
    $_SESSION['error'] = 'Email already exist';
    header ('Location: index.php');
} else {

// Create the new users in the database
$sql = "INSERT INTO users (name, email, birthdate, password) VALUES (?,?,?,?);"; // La requête
$q = $pdo->prepare($sql);
$q->execute([$namecreate,$usercreate,$birthdate,sha1($passwordcreate)]);

//make a 4 digit number and update the number in the database.
$userID = $pdo->lastInsertId();
$userNumber = mt_rand(1111,9999);
//check that the number created does not exist in the database
$sql = "SELECT id FROM users WHERE number = '$userNumber';";
$q = $pdo->prepare($sql);
$q->execute();
while($q->fetchAll() != NULL){
    $userNumber = mt_rand(1111,9999);
    $sql = "SELECT id FROM users WHERE number = '$userNumber';";
    $q = $pdo->prepare($sql);
    $q->execute();
}
// update number to unique number.
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
}
?>
  
