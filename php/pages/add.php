<?php
session_start();
require('../conn.php');


if(isset($_POST['submit'])){
    $naam = $_POST["naam"];
    $des = $_POST["descriptie"];
    $direct = $_POST["director"];
    $act = $_POST["acteur"];
    //afbeeldingspad uploaden en afbeelding zelf verplaatsen
    $image = $_FILES['image'] ['name'];
    $folder = "afb/";
    move_uploaded_file($_FILES['image']["tmp_name"], "$folder".$image);
    $target = "afb/".basename($image);

    $url = $_POST["vurl"];
    $soort = $_POST["soort"];


    $select = "SELECT naam FROM films WHERE naam='$naam'";	
    //$select2 = "SELECT username FROM user WHERE email='$email'";	
    $results = mysqli_query($conn, $select);
   // $results2 = mysqli_query($conn, $select2);
   //als de gebruikfilm naam al voorkomt in de db geeft de onderstaande code een foutmelding
if (mysqli_num_rows($results) > 0) {
    $Fout = "Deze film is al gemaakt!"; 
}else{
    //insert de gegevens in de database
    $sql = "INSERT INTO `films` (naam, descriptie, director, acteur, image, vurl, soort) VALUES ('$naam', '$des', '$direct', '$act', '$image', '$url', '$soort')";
    $result = mysqli_query($conn, $sql);
    
    if($result){
        header("Location: ../home.php");
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
<img src="/../film/filmdb/img/logo.png" alt="logo">
</div>

<div class="forms">

<form name="add" method="POST" action="" enctype="multipart/form-data">

<input type="text" name="naam" placeholder="Film Naam"><br>
		<?php if (isset($Fout)): ?>
			<span><?php echo $Fout; ?></span>
		<?php endif ?>

        <input type="text" name="descriptie"  placeholder="Descriptie*" required/> <br>

        <input type="text" name="director"  placeholder="Director"/> <br>

        <input type="text" name="acteur"  placeholder="Acteurs" required autofocus/> <br>

        <input type="text" name="vurl" placeholder="video url"/> <br>

        <input type="file" name="image"><br>

        <input type="text" name="soort" placeholder="Sleutelwoord film, bijv. auto, geweer, relaties"><br>
        
		
		<input type="submit" value="submit" name="submit">


</form>

        </div>
</body>

</html> 