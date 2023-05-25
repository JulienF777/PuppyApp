

<?php

session_start();

if($_SESSION['login'] != false){

?>
  <!DOCTYPE html>
  <html lang="pt">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=ISO8859-1">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Bootstrap core CSS -->
      <link href="bootstrap413/css/bootstrap.min.css" rel="stylesheet">
  
      <!-- Custom styles for this template -->
      <link href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/login.css" rel="stylesheet">
  </head>
  
  <body>
      
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand navbar-brand-login" href="#">
        <img src="images/logo_puppyapp.png" alt="Logo" width="100" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
  
  <?php
    echo "<h1 class='hello'>Hello ".$_SESSION['user']['name']." !</h1>";

    echo "<table class='table'>
    <tr>
      <th>Name</td>
      <td>".$_SESSION['user']['name']."</td>
    </tr>
    <tr>
      <th>Email</td>
      <td>".$_SESSION['user']['email']."</td>
    </tr>
    <tr>
      <th>Number</td>
      <td>".$_SESSION['user']['number']."</td>
    </tr>
    <tr>
      <th>Birthdate</td>
      <td>".$_SESSION['user']['birthdate']."</td>
    </tr>

  </table>

  <form action='edit.php' method='POST' class='boutons'><input type='submit' value='Edit my account' class='btn btn-outline-secondary btn-pink'></form>
  
  ";
  // <form action='delete.php' method='POST' class='boutons'><input type='submit' value='Delete my account' class='btn btn-outline-secondary'></form>
    echo "<form action='logout.php' method='POST' class='boutons'><input type='submit' value='Log out' class='btn btn-outline-secondary'></form>";


    // Admin pannel
    include("connect.php");
    if($_SESSION['user']['user'] == 'admin'){
        echo "<h1 class='title'>Admin manager panel</h1>";
        echo "<a id='createaccount' href='admincreate.php'>Create an account</a>";
        echo "
        <table class='table table-pink'>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Birthdate</th>
          <th>Type</th>
          <th>Operations</th>
        </tr>";

        $sql = "SELECT * FROM users"; // The query
        $q = $pdo->prepare($sql);
        $q->execute();
        
        $users = []; // Create an empty array to store all users
        
        while($line = $q->fetch()) {
            $users[] = $line; // Add each user to the array
            
            echo "<tr>";
            echo "<td>".$line['name']."</td>";
            echo "<td>".$line['email']."</td>";
            echo "<td>".$line['birthdate']."</td>";
            echo "<td>".$line['user']."</td>";
            echo "<td><form action='user.php' method='POST'>";
            echo "<input type='hidden' name='id' value=".$line['id'].">";
            echo "<input type='submit' value='Manage account' name='editbutton' class='btn btn-outline-secondary btn-pink'>";
            echo "</form>";
            echo "<br>";
        }
        
        $_SESSION['users'] = $users; // Store all users in the session
        

    } else {
        
    }

} else {
    echo "you need to log in";
    header ('Location: login.php');
}

?>

<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
