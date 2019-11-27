<?php
session_start();
require('conn.php');

if($_SESSION['userid'] != null){
    $id = $_SESSION['userid'];

//echo $_SESSION['userid'];

?>

<!doctype html>
<div class="header">

    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Movies</title>
    </head>
<body>
<div class="logo" >
    <img src="../img/logo.png" alt="logo">
</div>
</div>
<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="../php/pages/add.php">Add a movie</a></li>
  <li><a href="list.php">List</a></li>
  <li><a href="profile.php">Profile</a></li>
</ul>
<div class="form1">
<form action="./pages/search.php" method="GET">
    <input type="text" placeholder="Zoek op film naam, directors of acteurs!" name="search" />

</form>
</div>


<h1> Recomendations: </h1>
<table id="huis">
			<tr><th></th><th>naam</th><th>descriptie</th><th>director</th><th>acteur</th></tr>
			
			<?php
            
          //  SELECT user_films.userid, films.film_id, films.image, films.naam, films.descriptie, films.director FROM user_films, films WHERE user_films.userid =".$id." AND user_films.soort = films.soort AND user_films.film_id != films.film_id ORDER BY user_films.date DESC LIMIT 8
            // SELECT * FROM films where soort IN (SELECT DISTINCT soort FROM user_films WHERE user_films.userid = 2 AND  user_films.film_id != films.film_id  ORDER BY date DESC )
	$sql="SELECT f1.film_id, image, naam, descriptie, director 
    FROM films f1
    LEFT JOIN user_films f2 ON f1.film_id = f2.film_id AND f2.userid =".$id." 
    WHERE f2.film_id IS NULL ";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_row($result_set))
	{
		echo '<tr>';
        echo '<td><img src="./pages/afb/'. $row[1] . '"width="200px" height="200px"></a></td>';
        echo '<td>'. $row[2] . '</td>';
		echo '<td>'. $row[3] . '</td>';
        echo '<td>'. $row[4] . '</td>';

        echo '<td><a href="./pages/film.php?id='.$row[0].'"><button>Bekijken</button></a></td>';	
        echo '</tr>';
	}
		?>
		</table>
		</div>
		</div>
		<?php
		mysqli_close($conn);
?>






</body>

</html>
<?php

}else{
    header("location:login.php");
exit;
}
?>