<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Sign in Output</title>
</head>

<body>
<?php

if (count($_POST))
{
    // Get users.txt path and read each line, put username and password as array
    $path = file('/home/lilin1/users.txt');
    $contents = array();
    foreach ($path as $line) {
        list($user, $pwd) = explode(',', $line);
        $contents[trim($user)] = trim($pwd);
    }

    // Parse form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    //  Check username is or not in our system in users.txt data
    //  if so, user log in to home page.
    //  if not, show error message for 2 second and return to home page
    if (array_key_exists($username, $contents) && $password == $contents[$username]) {
       $_SESSION['username'] = $_POST['username'];
        echo "Username and Password is correct";
        header('Location: myhomepage.php');
                exit;
    } else {
        header('Refresh:2; url=FileSharing.html');
        echo "Invalid username and/or password, please check your username and password or sign up for an account.";
    }
}

?>
</body>
</html>