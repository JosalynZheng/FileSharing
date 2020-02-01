<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete Your Account</title>
    <link type="text/css" rel="stylesheet" href="Style.css">
</head>
<div class = "fa">
<body>
<?php
    session_start();
    $user = $_SESSION['username'];
    //Delete username in users.txt
    file_put_contents("../users.txt", str_replace($user."\n", '', file_get_contents("../users.txt")));
    //Delete accociated files
    $filesfrom = sprintf("../upload/%s/*.*/", $user);
    $files = glob($filesfrom);
    foreach($files as $file){
        unlink($file);
    }
    $filepath = "../upload/$user";
    rmdir($filepath);
    session_destroy();
    echo "Your account has already deleted.<br><br>";
    echo "<a href = 'login_out.php'>Back to Login Page</a>";
?>
</body>
</html>