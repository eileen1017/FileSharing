<?php
//	Session check
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

	//	Get friend name
	$isf = 0;
	$fname = $_POST['friendname'];

	// parse users.txt
	$path = file('/home/lilin1/users.txt');
    $contents = array();
    foreach ($path as $line) {
        list($user, $pwd) = explode(',', $line);
        $contents[trim($user)] = trim($pwd);
    }
    
    // Check input to match users.txt data
    //	Check friend is in system or not
    if (!array_key_exists(trim($fname), $contents)) {
        header("refresh:3; url=myhomepage.php");
        echo "Username is not found in system.";
        exit;
    } 


    // Another path to check if current user is inside friend's friend list or not.
	$path2 = file('/home/lilin1/uploadfiles/'.$fname.'/friends.txt');

	
    foreach ($path2 as $line) {
		if (trim($line) == $_SESSION['username']){
			$isf = 1;
		}
    }
	
	//	If not exist, error message displayed 
	if ($isf == 0 ) {
		header("refresh:3; url=myhomepage.php");
        echo "Friend does not exist, try again!";
	}else{
		
		// else, it will diplay friend's shared files.
		echo "<b>Here are your friend shared files: </b><br>";
		$dir = "/home/lilin1/uploadfiles/".$fname ."/sharedfiles/";
		$dh  = opendir($dir);
		while (false !== ($newfilename = readdir($dh))) {
			if($newfilename !== "." && $newfilename !== ".."){
				echo '<div><a href="showfile.php?currentfolder=sharedfiles&newfilename='.urlencode($newfilename).'">'.$newfilename.'</a></div>';

			}
		}
	}
?>
		<form action="myhomepage.php" method="POST">
            <input type="submit" value="Return to Home"/>
        </form>
</body>
</html>
