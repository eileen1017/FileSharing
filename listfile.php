<?php
// session check
session_start();
if (!isset($_SESSION['username'])){
   header("Location: FileSharing.html");
 }
 ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Show All Folders</title>
</head>

<body>
	<?php
	//	display all the folders under current user with a hyperlink to click for opening
	echo "<b>Here are all your folders: </b><br>";
	//	Get directory
	$dir = "/home/lilin1/uploadfiles/".$_SESSION['username'];
	$dh  = opendir($dir);
	//	read folder
	while (false !== ($filename = readdir($dh))) {
		//	folder name check, hide friend.txt
		if($filename !== "." && $filename !== ".." && $filename !== "friends.txt"){
		echo '<div><a href="showfolders.php?filename='.urlencode($filename).'">'.$filename.'</a></div>';
}}	
?>		
		<!-- Back to home page button -->
		<form action="myhomepage.php" method="POST">
            <input type="submit" value="Return to Home"/>
        </form>
</body>
</html>
