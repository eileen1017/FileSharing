<?php
session_start();
if (!isset($_SESSION['username'])){
   header("Location: FileSharing.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
        <meta charset="UTF-8">
        <title> Delete file </title>
</head>
<body>

<?php
$filename = $_POST["filename"];


// Check if file exists in user's own file folder or shared file folder
//	if exist, delete it
//	if not, error message displayed.
if ( !file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles/'.$filename) ){

    if ( !file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename) ){
            echo "Sorry, file does not exists. Please check your filename.";
    } else {
		if ( file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version2/'.$filename) ){
			unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version2/'.$filename);
		}
		if ( file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version1/'.$filename) ){
			unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version1/'.$filename);
		}
		
        if (unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename)) {
			header('Refresh:2; url=myhomepage.php');
			echo "The file $filename has been deleted from sharedfiles.";
		} else {
			header('Refresh:2; url=myhomepage.php');
			echo "Sorry, there was an error deleting your file from sharedfiles.";
		}
    }
} 
else {
	if ( file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles_version2/'.$filename) ){
		unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles_version2/'.$filename);
	}
	if ( file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles_version1/'.$filename) ){
		unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles_version1/'.$filename);
	}
	
	if (unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/myfiles/'.$filename)) {
        header('Refresh:2; url=myhomepage.php');
        echo "The file $filename has been deleted from myfiles.";
    } else {
        header('Refresh:2; url=myhomepage.php');
        echo "Sorry, there was an error deleting your file from myfiles.";
    }
}

?>

</body>
</html>