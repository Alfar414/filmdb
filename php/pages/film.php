<?php
session_start();

include('../conn.php');
$id = $_GET['id'];

if(isset($_POST['submit'])){

  $filmid = $_POST["filmid"];
  $id = $_POST["id"];
  $woord = $_POST["woord"];



$sql1 = "INSERT INTO `user_films` (filmid, id, woord) VALUES ('$filmid', '$id', '$woord')";
$result1 = mysqli_query($conn, $sql1);

if (($result1)) {
  header("Location: ../home.php");

}

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
}

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

<table>
	
			<?php
	$sql="SELECT * FROM films where film_id = ".$id;
    $result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_row($result_set))
	{
		echo '<tr>';
        echo '<td><img src="afb/'. $row[2] . '"width="100px" height="100px"></a></td>';

        echo '<td>'. $row[1] . '</td>';
		    echo '<td>'. $row[3] . '</td>';
        echo '<td>'. $row[4] . '</td>';
        echo '<td>'. $row[5] . '</td>';	
        echo '<td>'. $row[7] . '</td>';
        $url = $row[6];
        $filmid = $row[0];
        $woord = $row[7];

        echo '</tr>';	

        echo '<input type="submit" value="submit" name="submit">';

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