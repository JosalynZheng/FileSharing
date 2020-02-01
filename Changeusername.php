<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Username</title>
    <link type="text/css" rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="fa">
    <h2 style="text-align:center">Please Change Your Username</h2>
    <form name="input" class="centered" action="Changeusername.php " method="POST">
        <input type="text" name="newname" placeholder="Please Enter Your New Username" required>
        <input type="submit" name="submit" value="Update"><br><br>
        <a href="Home.php" style ="font-size:16px">Back to Homepage</a>
    </form>
</div>
<?php
    session_start();
    $user = $_SESSION['username'];
    if(isset($_POST['submit'])){//if user want to update
        $new = $_POST['newname'];//Get new name and save as $new
        if($new!=''){
            // Check if users enter invalid username
            if(!preg_match('/^[\w_\-]+$/', $new)){
                echo "Invalid username. Please try again.";
                exit;
            }
            //Check if new name has already exist
            $folder_upload = sprintf("../upload/%s", $new);
            if(file_exists($folder_upload)){
                echo "Username already exist. Please change another username!";
            }else{//if it is a valid username
                //Change newname in users.txt
               file_put_contents("../users.txt", str_replace($user, $new, file_get_contents("../users.txt")));
                // Rename new userfile
                $source = "../upload/" .$user;
                $dest = "../upload/" .$new;
                rename("$source", "$dest");
                // Update session
                $_SESSION['username'] = $new;
                echo "Username updated successfully!";
            }
        }
    }
?>
</body>   
</html>  