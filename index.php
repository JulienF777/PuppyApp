

<?php

session_start();

if($_SESSION['login'] != false){
    echo "Hello ".$_SESSION['user']['name'];

    echo "<table>
    <tr>
      <td>Name</td>
      <td>".$_SESSION['user']['name']."</td>
      <td></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>".$_SESSION['user']['email']."</td>
    </tr>
    <tr>
      <td>Type</td>
      <td>".$_SESSION['user']['user']."</td>
    </tr>
    <tr>
      <td>Birthdate</td>
      <td>".$_SESSION['user']['birthdate']."</td>
    </tr>


  </table>

  <form action='edit.php' method='POST'><input type='submit' value='Edit my account'></form>
  <form action='delete.php' method='POST'><input type='submit' value='Delete my account'></form>

  ";

    echo "<form action='logout.php' method='POST'><input type='submit' value='Log out'></form>";


    // Admin pannel
    include("connect.php");
    if($_SESSION['user']['user'] == 'admin'){
        echo "admin manager panel<br>";
        echo "
        <table>
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
            echo "<input type='submit' value='Manage account' name='editbutton'>";
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
