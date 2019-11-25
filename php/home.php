<?php
session_start();
require('conn.php');

if($_SESSION['id'] != null){
    $id = $_SESSION['id'];

echo $_SESSION['id'];

?>

<!doctype html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Movies</title>
    </head>
<body>
<div class="logo" >
    <img src="../img/logo.png" alt="logo">
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


<p> Recomendations: </p>
<table id="huis">
			<tr><th></th><th>naam</th><th>descriptie</th><th>director</th><th>acteur</th></tr>
			
			<?php
			
	$sql="SELECT * FROM films";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_row($result_set))
	{
		echo '<tr>';
        echo '<td><img src="./pages/afb/'. $row[2] . '"width="200px" height="200px"></a></td>';
        echo '<td>'. $row[1] . '</td>';
		echo '<td>'. $row[3] . '</td>';
        echo '<td>'. $row[4] . '</td>';
        echo '<td>'. $row[5] . '</td>';	
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