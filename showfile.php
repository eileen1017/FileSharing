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
<title>Display files</title>
</head>

<body>
<?php
// get filename and folder name
$filename = $_GET['newfilename'];
$folder = $_GET['currentfolder'];

//	check filename exits or not
//	if so, file will be dipalyed online
if (file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/'.$folder.'/'.$filename)) {
	$expensions= array("gif","jpeg","jpg","png");
	$file_ext=strtolower(end(explode('.',$filename)));
	if(in_array($file_ext,$expensions)=== true){
         $array = getimagesize("/home/lilin1/uploadfiles/".$_SESSION['username'].'/'.$folder.'/'.$filename);
		if( $array ){
			$image = file_get_contents("/home/lilin1/uploadfiles/".$_SESSION['username'].'/'.$folder.'/'.$filename);
			echo "<img src='data:image/jpg;base64,".base64_encode($image)."' alt='Approved Image'>";
		} else {
			 header('Refresh:2; url=listfile.php');
    		echo 'image broken';
		}
      } else {
    echo file_get_contents('/home/lilin1/uploadfiles/'.$_SESSION['username'].'/'.$folder.'/'.$filename);
	}
}
// Else, error message diplayed
else { echo "error.";}

?>
<br>
<button onclick="history.go(-1);">Return to all files </button>
</body>
</html>