

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
      <td>Sex</td>
      <td>".$_SESSION['user']['sex']."</td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type='password' value='".$_SESSION['user']['password']."'id='myInput'> <input type='checkbox' onclick='myFunction()'>Show Password </td>
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
          <th>Sex</th>
          <th>Type</th>
          <th>Operations</th>
        </tr>";

        $sql = "SELECT * FROM users"; // La requête
        $q = $pdo->prepare($sql);
        $q->execute();
        while($line=$q->fetch()) {

           
            $_SESSION['users'] = $line;
            
            echo "<tr>";
           echo "<td>".$line['name']."</td>";
           echo "<td>".$line['email']."</td>";
           echo "<td>".$line['sex']."</td>";
           echo "<td>".$line['user']."</td>";
           echo "<td><form action='user.php' method='POST'><input type='submit' name='".$line['id']."'>";
           echo "<br>";

        }
        

    } else {
        echo "not admin";
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
