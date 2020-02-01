<?php
 session_start();
        $user = $_SESSION['username'];
        if (!preg_match('/^[\w_\-]+$/', $user)) {
            echo "Invalid username";
            exit;
        }
        $filename = $_GET['file'];
        if(!preg_match('/^[\w_\.\-]+$/', $filename) ){
         echo "Invalid filename";
         exit;
        }
        //if both username and filename are valid, then we can get the path:
        $full_path = sprintf("../upload/%s/%s", $user, $filename);
        //get the MIME type
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($full_path);
        //set the Content-Type header to the MIME type of the file, and display the file.
        header("Content-Type: ".$mime);
        readfile($full_path);

?>