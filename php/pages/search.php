<?php
session_start();
include('../conn.php');

        $id = $_SESSION['id'];
        

?>

<html>

<link rel="stylesheet" type="text/css" href="/../film/filmdb/css/style.css">
    
    <title>Movies</title>
</head>
<body>
<div class="logo" >
<img src="/../film/filmdb/img/logo.png" alt="logo">
</div>
</div>
<ul>
<li><a  href="../home.php">Home</a></li>
<li><a class="active" href="../php/pages/add.php">Add a movie</a></li>
<li><a href="list.php">List</a></li>
<li><a href="profile.php">Profile</a></li>
</ul>
<div class="form1">
<form action="./pages/search.php" method="GET">
<input type="text" placeholder="Zoek op film naam, directors of acteurs!" name="search" />

</form>
</div>

<div class="search">

<?php
$output = '';
//Haalt de gegevens die op de ingevoerde tekst lijken op uit de database en geeft deze weer
if(isset($_GET['search']) AND $_GET['search'] !== ' '){
	$search = $_GET['search'];
	
	$sql = mysqli_query($conn, "SELECT * FROM films WHERE naam LIKE '%$search%' OR soort LIKE '%$search%'  OR acteur LIKE '%$search%'") or die(mysqli_error($conn));
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