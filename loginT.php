

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
        
        //check that user is enabled
        $email=$_POST['email'];
        $sql = "SELECT enabled FROM users WHERE email LIKE ?";
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));

        $result = $q->fetch();
        var_dump($result['enabled']);

        if($result['enabled']=='no'){
            echo "enabled = no";
            $_SESSION['error'] = 'Your account is not validated yet';
             header ('Location: login.php');
             exit;
        } else {

        $_SESSION['login'] = TRUE;
        $_SESSION['email'] = $line['email'];
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM users WHERE email LIKE ?"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute(array("%$email"));
            while($line=$q->fetch()) {

            //    var_dump($line);
               $_SESSION['user'] = $line;
        }

        header ('Location: index.php');
        
    }} else {
        $_SESSION['error'] = 'Invalid email or password';
        header ('Location: login.php');
    }
    
    } else {
    $_SESSION['error'] = 'Invalid email format';
    header ('Location: login.php');
}
}

// foreach($line as $user){
// if($user==$_POST['email'] AND $)
// }

?>
