<?php
//  session check
session_start();
if (!isset($_SESSION['username'])){
   header("Location: FileSharing.html");
 }
 ?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Upload Files</title>
</head>

<body>
<?php
   if(isset($_FILES['UploadedFiles'])){

      //  get filenames
      $errors= array();
      $filename = $_FILES['UploadedFiles']['name'];
      $file_tmp =$_FILES['UploadedFiles']['tmp_name'];
      $file_ext=strtolower(end(explode('.',$_FILES['UploadedFiles']['name'])));


      // Check if file exists in shared folders
      //  implementing version check and update to keep three most recent files with same name in different folders
        if (file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename)) {
            header('Refresh:3; url=myhomepage.php');
      if (file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version1/'.$filename)) {
        if(file_exists("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version2/'.$filename)){
          unlink("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version2/'.$filename);
        }
        
        rename("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version1/'.$filename,"/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version2/'.$filename);
        
      }
      
      rename("/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename,"/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles_version1/'.$filename);
      move_uploaded_file($file_tmp,"/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename);

      //  Update file to three recent uploaded same name file
      header('Refresh:3; url=myhomepage.php');
            echo "Success: Filename already exists, updated to newest version ";
        } 
        else {
            move_uploaded_file($file_tmp,"/home/lilin1/uploadfiles/".$_SESSION['username'].'/sharedfiles/'.$filename);
            header('Refresh:3; url=myhomepage.php');
            echo "Success! You now can view your files when click on 'Show All Files!'";
        }
   }
?>
</body>
</html