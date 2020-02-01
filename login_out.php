<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="Style.css">
</head>
<body>
<div class = "fa">
    <h2 style="text-align:center">Your Login Window</h2>
    <form name="input" class="centered" action="login_out.php " method="POST">
        <input type="text" name="username" placeholder="Please Enter Your Username" required>
        <input type="submit" name="submit" value="Submit"><br><br>
        <a href="register.php" class="register" style ="font-size:16px">Create Your Own Account</a>
    </form>
</div>
<span class = "login_outfb">
   
    <?php
        $myfile = fopen("../users.txt", "r");
        $j=0;
        while(!feof($myfile)){
            $usersbit[$j]=trim(fgets($myfile)); // Put usersname into an array
            $j++;
        }
        fclose($myfile);
    ?>
     <?php

        if(isset($_POST['submit'])){
            $user = $_POST['username']; // Make $user get the input username
            for($i=0; $i<count($usersbit)-1;$i++){
                if($usersbit[$i]== $user){ // If the input username match to the username in file
                    session_start(); // session start
                    $_SESSION['username']= $user; //if correct name store in session 
                    echo "Login successfully.";
                    header("Location:Home.php"); // head to Home Page
                    exit;
                }
                echo "Login Failed. Please Check Your Username."; // If no username matched in txt file, execute Failed Message.
            }
        }
    ?>
    </span>
    </div>
</div>
</body>
</html>