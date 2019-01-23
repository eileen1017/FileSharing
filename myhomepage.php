<?php
// check session
session_start();
if (!isset($_SESSION['username'])){
   header("Location: FileSharing.html");
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head> 
        <meta charset="UTF-8">
        <title> My Home Page </title>
</head>
<body>
        <h1>Hello, Welcome to Use Our File Sharing Tool.</h1>

        <!-- User input a friend's username and add friend button -->
        <form action="addfriend.php" method="POST">
            <b>Add a friend here:</b>
            <input type="text" name="fname">
            <input type="Submit" value="Add!">
        </form>
        <br>

        <!-- User can click to view all the files under his name -->
        <form action="listfile.php" method="POST">
            <b>Click to view all files: </b>
            <input type="submit" value="Show all files!"/>
        </form>
        <br>

        <!-- User can upload private files here -->
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <b>Upload file here: </b>
            <input type="file" name="UploadedFiles" />
            <input type="submit" value="Upload!" />
        </form>
        <br>
		
        <!-- User can add sharing files here -->
        <form action="share.php" method="POST" enctype="multipart/form-data">
            <b>Share file here: </b>
            <input type="file" name="UploadedFiles" />
            <input type="submit" value="Share!" />
        </form>
        <br>
		
        <!-- User can view friend's shared file by inputting friend's username -->
		<form action="view.php" method="POST" enctype="multipart/form-data">
            <b>Choose the friend you want to view the sharedfiles: </b>
            <input type="text" name="friendname" />
            <input type="submit" value="View!" />
        </form>
        <br>

        <!-- User can delete a file -->
        <form action="delete.php" method="POST">
            <b>Delete file here:</b>
            <input type="text" name="filename">
            <input type="Submit" value="Delete!">
        </form>

        <!-- Log out button -->
        <p> Log out or change an account? <a href="logout.php">Log Out</a>.


</body>
</html>