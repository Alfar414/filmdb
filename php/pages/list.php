<?php
session_start();

include('../conn.php');
$id = $_GET['id'];

$id2 = $_SESSION['userid'];

//echo $id2;


//echo $id;



//   $select = "SELECT * FROM user WHERE id=".$id;	
//   //$select2 = "SELECT username FROM user WHERE email='$email'";	
//   $results = mysqli_query($conn, $select);
// while($column=mysqli_fetch_row($results)){
  
//   if($column[5] == '' ){
//     $row[7] = $_POST['woord1'];


//     $sql = "INSERT INTO `user` (woord1) VALUES ('$row[7]')";

    
//     if($result){
//         header("Location: ../home.php");
//   }else{
//     echo 'er is iets mis gegaan';	
//     }

//     }
//   }


?>

<!doctype html>


<div class="header">

<head>
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
<li><a  href="../php/pages/add.php">Add a movie</a></li>
<li><a class="active" href="list.php">List</a></li>
<li><a href="profile.php">Profile</a></li>
</ul>
<div class="form1">
<form action="./pages/search.php" method="GET">
<input type="text" placeholder="Zoek op film naam, directors of acteurs!" name="search" />

</form>
</div>

<table>
	
			<?php
      //haalt de films op uit de database en geeft deze weer
	$sql="SELECT * FROM films";
    $result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_row($result_set))
	{
        //onderstaande code zorgt ervoor dat de opgehaalde gegevens in een tabel komen te staan
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

		</table>
</body>
</html>