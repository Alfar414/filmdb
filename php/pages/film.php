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
<li><a class="active" href="../php/pages/add.php">Add a movie</a></li>
<li><a href="list.php">List</a></li>
<li><a href="profile.php">Profile</a></li>
</ul>
<div class="form1">
<form action="./pages/search.php" method="GET">
<input type="text" placeholder="Zoek op film naam, directors of acteurs!" name="search" />

</form>
</div>

<table>
	
			<?php
      //haalt de film met een specifieke ID op uit de database en geeft deze weer
	$sql="SELECT * FROM films where film_id = ".$id;
    $result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_row($result_set))
	{
    echo '<tr>';
    echo '<table>		<th>Image</th><th>Naam</th><th>Descriptie</th><th>Director</th><th>Acteur</th><th>Soort</th><th></th></tr><td>';
        echo '<td><img src="afb/'. $row[2] . '"width="100px" height="100px"></a></td>';

        echo '<td>'. $row[1] . '</td>';
		    echo '<td>'. $row[3] . '</td>';
        echo '<td>'. $row[4] . '</td>';
        echo '<td>'. $row[5] . '</td>';	

        $url = $row[6];

        //  echo $url;
        // $filmid = $row[0];
        // $woord = $row[7];
        echo '<td><a href="recommend.php?id='.$row[0].'" ><button type="button">Vind ik leuk!</button></a></td>';

        echo '</tr>';	

	}
		?>
		</table>

            <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>


<script>
  // 2. This code loads the IFrame Player API code asynchronously.
  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // 3. This function creates an <iframe> (and YouTube player)
  //    after the API code downloads.
  var player;
  function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
	  height: '390',
	  width: '640',
	  videoId: '<?php echo $url; ?>',
	  events: {
		'onReady': onPlayerReady,
		'onStateChange': onPlayerStateChange
	  }
	});
  }

  // 4. The API will call this function when the video player is ready.
  function onPlayerReady(event) {
	event.target.playVideo();
  }

  // 5. The API calls this function when the player's state changes.
  //    The function indicates that when playing a video (state=1),
  //    the player should play for six seconds and then stop.
  var done = false;
  function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.PLAYING && !done) {
	  setTimeout(stopVideo, 6000);
	  done = true;
	}
  }
  function stopVideo() {
	player.stopVideo();
  }
</script>
</body>
</html>