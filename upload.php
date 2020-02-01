<!DOCTYPE html>
<html lang='en'>

    <head>
        <title>Upload Files</title>
        <link type="text/css" rel="stylesheet" href="Style.css">
    </head>
    <body>


    <h3 style="text-align:center">Choose a file to upload</h3>
    <form class="wrapper" enctype="multipart/form-data" action="upload.php" method="POST">
    <!--enctype编码类型  action 处 将表单数据发送到页面本身
    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
    -->
        <p>
            <label for="file">Filename:</label>
            <input type="file" name="file" id="file" />
            <br />

            <input type="submit" name="submit" value="Upload" />
        </p >
        <p>
            <a href = "Home.php ">Back</a >
        </p >
    </form>

    <div style="text-align:center">
    <span class = "uploadfb">

    </span>
    </div>
</body>
</html>
    <?php
        session_start();
        if (isset($_POST['submit'])){

            // Get the username 
            $username = $_SESSION['username'];
            //$username = "bo";
            //check if it is valid
            if( !preg_match('/^[\w_\-]+$/', $username) ){

                echo "Invalid username";
                exit;
            }
      //upload file
            //filtering input
            if ($_FILES["file"]["size"] < 20000000){
                //check if the file existed before
                if (file_exists("../upload/" .$username."/". $_FILES["file"]["name"])){//address 
                    echo $_FILES["file"]["name"] . " already exists. ";
                }else{
                    // check if the user has his/her own folder
                    if (!file_exists("../upload/" .$username)) {
                            //make the specific one for user
                            mkdir("../upload/" .$username, 0777, true);
                            chown("../upload/" .$username, "apache");
                            move_uploaded_file($_FILES["file"]["tmp_name"],
                            "../upload/" .$username."/". $_FILES["file"]["name"]);
                    //echo "Stored in: " . "../upload/" .$username."/". $_FILES["file"]["name"];

                    }else{
                         move_uploaded_file($_FILES["file"]["tmp_name"],
                            "../upload/" .$username."/". $_FILES["file"]["name"]);
                    //echo "Stored in: " . "../upload/" .$username."/". $_FILES["file"]["name"];

                    }
                    echo "Succeed!";
                    //header("Location : mainpage.php");
                }
            }
        else
          {
          echo "Invalid file";

          }

        }
    ?>
