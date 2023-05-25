

<?php
include("connect.php"); // On se connecte à la base
?>

<?php

session_start();

echo "post";
var_dump($_POST);
echo "<br><br>";

//reset error message for wrong login
$_SESSION['fail'] = false;

$sql = "SELECT * FROM users"; // La requête
$q = $pdo->prepare($sql);
$q->execute();
while($line=$q->fetch()) {
	// A completer
	// Chaque film fois avoir un lien vers film.php avec l'id adéquat
//     echo "line";
// var_dump($line);
// echo "<br><br>";
// var_dump($line['email']);
// echo $_POST['email'];
// echo "<br><br>";

if(filter_var($line['email'], FILTER_VALIDATE_EMAIL)==true){

    if($line['email'] == $_POST['email'] AND $line['password'] == sha1($_POST['password'])){
        
        $_SESSION['login'] = TRUE;
        $_SESSION['email'] = $line['email'];
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email LIKE ?"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));
            while($line=$q->fetch()) {

               var_dump($line);
               $_SESSION['user'] = $line;
        }

        header ('Location: index.php');
        
    } else {
        
        header ('Location: index.php');
    }
    
    } else {
    header ('Location: index.php');
}
}

// foreach($line as $user){
// if($user==$_POST['email'] AND $)
// }

?>
