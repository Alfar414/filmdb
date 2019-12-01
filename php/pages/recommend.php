<?php

session_start();

include('../conn.php');
    $id = $_GET['id'];
    echo $id;
	$id2 = $_SESSION['userid'];
    echo $id2;
    //voegt de film data en de userdata toe aan een koppeltabel genaamd user_films
    $sql1 = "INSERT into `user_films` (userid, film_id, soort) SELECT e.userid, f.film_id, f.soort FROM (films f, user e) WHERE e.userid=".$id2." AND f.film_id=".$id.";";
    $result = mysqli_multi_query($conn, $sql1);	
    // $sql = "Insert into `user_films` (userid, film_id, woord)
    // SELECT e.userid, f.film_id, f.woord 
    // FROM (films f, user e)
    // WHERE e.userid='$id2' AND f.film_id='$id';";
    // $result = mysqli_multi_query($conn, $sql);	
    

// $sql1 = "INSERT INTO `user_films` (filmid, id, woord) VALUES ('$filmid', '$id', '$woord')";
// $result = mysqli_query($conn, $sql1);

if ($result) {
    //voegt de huidige datum toe aan de user_films tabel
   $sql2 = "INSERT INTO `user_films` (date) VALUES (CURRENT_TIMESTAMP()) WHERE userid =".$id2;
   $result2 = mysqli_query($conn, $sql2);	

   header("Location: ../home.php");

}
  


  ?>