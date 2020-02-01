<html lang="en">
<head>
    <title>HomePage</title>
    <link type="text/css" rel="stylesheet" href="Style.css">
</head>
<body>
   <?php
        session_start();
        $user = $_SESSION['username'];
   ?>
    <header>
        <nav>
            <ul>
               <div style="text-align:center">
               <?php echo $user;?>
               </div>
              <div style="text-align:center" >
              <a href ="logout.php">Logout</a>
              <a href ="Changeusername.php">Change Your Username</a>
              <a href ="deleteaccount.php">Delete Account</a>
            </ul>
        </nav>
    </header>
    <!-- Following code is cited from https://classes.engineering.wustl.edu/cse330/index.php?title=PHP Part: Uploading a File-->
   <form enctype="multipart/form-data" action="upload.php" method="POST">
         <p>
                <input type="submit" value="Upload File" />
         </p>
   </form>
   </div>
<div style ="font-size:16px" class="name">
    <?php
        // Read files from uploads files and store it to session
        $filesfrom = sprintf("../upload/%s/*.*/", $user);  //Get the path of files
        $files = glob($filesfrom); // Get file list from current user
        foreach($files as $file){
            $name = basename($file);
            echo $name;
            echo '<br />';
            echo " Last accessed: " .date("F d Y H:i:s.", fileatime($file));//Show the exact time of last access.
            echo '
           <li><a href = "View.php?file=' . $name .'">View File</a></li>
           <li><a href = "Delete.php?file=' . $name .'">Delete</a></li>';
        }
    ?>
    </div>
    </form>
</body>
</html>