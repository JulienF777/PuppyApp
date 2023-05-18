<?php
include("connect.php"); // On se connecte à la base
?>

<?php
session_start();

// user update
$userid = $_SESSION['user']['id'];
$newemail = $_POST['email'];
$newpassword = $_POST['password'];
$newname = $_POST['name'];
$newsex = $_POST['sex'];

function clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
clean($newname);

$sql = "UPDATE users SET ";
$params = [];

if (!empty($newname)) {
    $sql .= "name=?, ";
    $params[] = $newname;
}
if (!empty($newemail)) {
    $sql .= "email=?, ";
    $params[] = $newemail;
}
if (!empty($newsex)) {
    $sql .= "sex=?, ";
    $params[] = $newsex;
}
if (!empty($newpassword)) {
    $sql .= "password=?, ";
    $params[] = $newpassword;
}

// Remove the last comma and space from the SQL query
$sql = rtrim($sql, ', ');

$sql .= " WHERE id=?";
$params[] = $userid;

$q = $pdo->prepare($sql);
$q->execute($params); // Pass the parameters as an array

//Update the session to the new values
session_unset();
session_destroy();
session_start();

        $sql = "SELECT * FROM users WHERE email LIKE ?"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute(array("%$newemail"));
            while($line=$q->fetch()) {

               var_dump($line);
               $_SESSION['user'] = $line;
        }
        $_SESSION['login'] = TRUE;
        $_SESSION['email'] = $newemail;

header ('Location: index.php');
?>
