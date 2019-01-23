<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Sign up Output</title>
</head>

<body>
<?php

if (count($_POST))
{
    // set sesssion name as username
    $_SESSION['username'] = $_POST['username'];

    // Parse users.txt
    $path = file('/home/lilin1/users.txt');
    $contents = array();
    foreach ($path as $line) {
        list($user, $pwd) = explode(',', $line);
        $contents[trim($user)] = trim($pwd);
    }

    // Parse form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check input versus users.txt data
    //  if successfully sign up, it will automatically make folders and files each user will be required to have
    if (array_key_exists($username, $contents) ) {
        echo "Username occupied, please choose another username.";
        header('Refresh:2; url=signup.html');
    } else {
        $info = "$username,$password".PHP_EOL;
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username'] , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username'], 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles" , 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles" , 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles_version1" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles_version1" , 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles_version2" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."myfiles_version2" , 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles_version1" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles_version1" , 0755);
        mkdir("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles_version2" , 0777);
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."sharedfiles_version2" , 0755);
        touch("/home/lilin1/uploadfiles/" .$_POST['username']."/"."friends.txt");
        chmod("/home/lilin1/uploadfiles/" .$_POST['username']."/"."friends.txt", 0755);


        
        file_put_contents('/home/lilin1/users.txt', $info, FILE_APPEND);
        echo 'Your account has set up successfully!';
        header("refresh:2; url=FileSharing.html");
    }
}

?>
</body>
</html>