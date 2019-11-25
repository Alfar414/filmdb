<?php

require('conn.php');
// als de values "posted" zijn voegt deze toe in de db
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $bio = $_POST["bio"];
    $email = $_POST["email"];

    //query om de gebruikersnaam op te halen uit de db
    $select = "SELECT username FROM user WHERE username='$username'";	
    //$select2 = "SELECT username FROM user WHERE email='$email'";	
    $results = mysqli_query($conn, $select);
   // $results2 = mysqli_query($conn, $select2);
   //als de gebruikersnaam al voorkomt in de db geeft de onderstaande code een foutmelding
if (mysqli_num_rows($results) > 0) {
    //$Fout2 = "Dit emailadres is al in gebruik, heeft u al een account? Log dan in!"; 
    $Fout = "Deze gebruikersnaam is al in gebruik, heeft u al een account? Log dan in!"; 
}else{
    //insert de gegevens in de database
    $sql = "INSERT INTO `user` (username, pass, bio, email) VALUES ('$username', '$pass', '$bio', '$email')";
    $result = mysqli_query($conn, $sql);
    // na de insert gaat de code naar de login.php
if($result){
        header("Location: login.php");
}else{
    echo 'er is iets mis gegaan';	
    }

}
    }

?>
<html>  

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>Movies</title>
</head>

<body>
<div class="logo" >
<img src="../img/logo.png" alt="logo">
</div>

<div class="forms">

<form name="register" method="POST" action="">

<input type="text" name="username" placeholder="Gebruikersnaam"><br>
		<?php if (isset($Fout)): ?>
			<span><?php echo $Fout; ?></span>
		<?php endif ?>

        <input type="text" name="pass"  placeholder="Wachtwoord*" required/> <br>

        <input type="text" name="bio"  placeholder="Bio"/> <br>

        <input type="text" name="email"  placeholder="Email adres*" required autofocus/> <br>

        <input type="submit" value="submit" name="submit">


</form>

        </div>
</body>

</html> 