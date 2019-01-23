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
        <title> Add friends </title>
</head>
<body>

<?php
// Get session as username
$username = $_SESSION['username'];

//  get input as friend name
$fname = $_POST["fname"];
$addOk = 1;
$isf = 0;
    
    // Get users.txt path and read each line, put username and password as array
    $path = file('/home/lilin1/users.txt');
    $contents = array();
    foreach ($path as $line) {
        list($user, $pwd) = explode(',', $line);
        $contents[trim($user)] = trim($pwd);
    }
    
    //  Check friend name is or not a user in our system in users.txt data
    //  if so, show error message for 2 second and return to home page
    if (!array_key_exists(trim($fname), $contents)) {
        header("refresh:2; url=myhomepage.php");    
        echo "Username is not found in system.";
        exit;
    } 
    
    //  Check friend name already in friend list or not
    $path2 = file('/home/lilin1/uploadfiles/'.$username.'/friends.txt');
    foreach ($path2 as $line) {
    if (trim($line) === $fname){
        $isf = 1;
    }
    }

    // if in friend list, return error message, if not, add friend 
    if ($isf === 1) {
        header("refresh:2; url=myhomepage.php");  
        echo "$fname is already your friend. You cannot add again.";
    } else {
        file_put_contents('/home/lilin1/uploadfiles/'.$username.'/friends.txt', $fname, FILE_APPEND);
        echo $fname.' is added to your friend list!';
        header("refresh:2; url=myhomepage.php");
    }


?>
</body>
</html>