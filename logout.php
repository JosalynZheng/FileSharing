<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logout</title>
</head>
<body>
    <?php
        session_start();
        session_destroy();
        header("Location:login_out.php");
    ?>
    
</body>
</html>