<?php
    session_start();
    $user = $_SESSION['username'];
    if(isset($_GET['file'])){
        $deletefile = $_GET['file'];
        $deletepath = sprintf("../upload/%s/%s", $user, $deletefile);//upload file address;
       // echo $deletepath; 
        unlink($deletepath);
        header("Location: Home.php");
    }
?>