<?php
//	session check
session_start();
if (!isset($_SESSION['username'])){
   header("Location: FileSharing.html");
 }
 ?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Show All Files</title>
</head>

<body>
	<?php
	//	Show all file name after clicking on the folder
	echo "<b>Here are all your files: </b><br>";
	$dir = "/home/lilin1/uploadfiles/".$_SESSION['username']."/".$_GET['filename'];
	$dh  = opendir($dir);
	//	read filename
	while (false !== ($newfilename = readdir($dh))) {
		if($newfilename !== "." && $newfilename !== ".."){
			// create url for directing
			$query_string = 'newfilename=' . urlencode($newfilename) . '&currentfolder=' . urlencode($_GET['filename']);
		echo '<a href="showfile.php?' . htmlentities($query_string) . '">'.$newfilename.'</a></div><br>';

}}
?>
		<form action="listfile.php" method="POST">
            <input type="submit" value="Return to folders"/>
        </form>

</body>
</html>
