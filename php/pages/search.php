<?php
session_start();
include('../conn.php');

        $id = $_SESSION['id'];
        

?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="/../film/css/style.css">
<title>Movies</title>
</head>

<body>
<div class="logo" >
<img src="/../film/filmdb/img/logo.png" alt="logo">
</div>

<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="../php/pages/add.php">Add a movie</a></li>
  <li><a href="list.php">List</a></li>
  <li><a href="profile.php">Profile</a></li>
</ul>

<div class="search">

<?php
$output = '';

if(isset($_GET['search']) AND $_GET['search'] !== ' '){
	$search = $_GET['search'];
	
	$sql = mysqli_query($conn, "SELECT * FROM films WHERE naam LIKE '%$search%' OR director LIKE '%$search%' OR acteur LIKE '%$search%'") or die(mysqli_error($conn));
	$count = mysqli_num_rows($sql);
	if($count == 0){
		$output = 'no search results for <b>"' . $search . '"</b>';
	} else {
		while($row = mysqli_fetch_array($sql)){
		$naam = $row["naam"];
		$descriptie = $row["descriptie"];
		$director = $row["director"];
        $acteur = $row["acteur"];
        $image = $row["image"];
		
		$output .= '<table>		<tr><th>Naam</th><th>descriptie</th><th>director</th><th>acteur</th><th>Afbeelding</th><th></th><th></th></tr><td>' 
		. $naam . '</td><td>' . $descriptie . '</td><td>' . $director . '</td><td>' . $acteur . '</td><td><img src="afb/' . $image . '"width="200px" height="200px"</td><td><a href="film.php?id='.$row[0].'"><button>Bekijken</button></a></td></table>';
		}
		}
	}else {
		header("location: ../home.php");
	}

print("$output"); 

mysqli_close($conn);

?>
</div>

</body>

</html>