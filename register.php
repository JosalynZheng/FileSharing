<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link type="text/css" rel="stylesheet" href="Style.css">

</head>
<body>
<div class="fa">
<h2 style="text-align:center">Sign up for File Share System</h2>
        <form action="register.php" class="centered" method="post">
        <input type="text" name="username" placeholder="username"/>
        <input type="submit" name="submit" value="Create"/><br><br>
        <a href="login_out.php" class="register" style="font-size:15px;">Go Back to Login</a>
    </form>
        </div>

    <?php
        session_start();
        if(isset($_POST['submit'])){
            $registeruser = trim($_POST['username']);
            //echo $registeruser;
            if($registeruser!=''){
                // Check if users enter invalid username
                if(!preg_match('/^[\w_\-]+$/', $registeruser)){
                    echo "Invalid username. Please try again.";
                }
                //Check if new register has already exist
                $folder_upload = sprintf("../upload/%s", $registeruser);
                if(file_exists($folder_upload)){
                    echo "Username already exist. Please change another username!";
                }else{
                    $usersfile = fopen("../users.txt", "a");
                    fwrite($usersfile,$registeruser."\n");
                    fclose($usersfile);
                    mkdir($folder_upload, 0777, true);
                    echo "Welcome to your own account!";
                }
            }
    }
    ?>
</body>
</html>