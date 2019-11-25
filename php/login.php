<?php

session_start();
include('conn.php');

if(isset($_POST['submit'])){



$username = $_POST['username'];
$password = $_POST['pass'];



$username = stripcslashes($username);
$password = stripcslashes($password);

//zoekt de naam en wachtwoord op uit de database
$sql = "SELECT id, username, pass FROM user WHERE username='$username' AND pass='$password'";
$result = mysqli_query($conn, $sql);
//zet de resultaten in $row
$row = mysqli_fetch_array($result);

$id = $row['id'];   

//controlleert of dezelfde rows de juiste gegevens hebben
if ($row['username'] == $username && $row['pass'] == $password){

    //zet de gebruikersnaam in een sessie waardoor deze ondhouden blijft
    $_SESSION['id'] = $id;

    echo $id;
    //verwijst door naar de home.php
    echo '<script type="text/javascript">
    window.location = "home.php"
</script>';
}
else{
    echo "verkeerde gebruikersnaam of wachtwoord";
    echo $result;
}
}

?>

<html>

<head>
<title>Login pagina</title>
</head>
<body>
    <div class="forms">
    <form action="" method="POST">

    <input type="text" name="username" placeholder="Gebruikersnaam"><br>

        <input type="text" name="pass"  placeholder="Wachtwoord*" required/> <br>

    <input type="submit" value="submit" name="submit">

    </form>

    <p> Klik <a href="login.php">HIER</a> als u al een account heeft.</p>
</div>
</body>
</html>