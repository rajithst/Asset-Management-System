<?php require 'core/init.php';

if(logged_in() === false){
    session_start();
    session_destroy();
    header('Location:index.php');
    exit();

} else {  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css">


</head>
<body>

    <div id="page">
        <header>
            <a title="asset" href="index.html">
                <div class="logo">
                    <img src="images/logo.png" height="66px" weight="66px" />
                    <span id="title">Asset Management System</span>
                </div>
            </a>
        </header>


        <h1>Logged in to the system,welcome to asset management</h1>


        <hr />
        <span id="footer">&#169; 2016</span>

    </div>



</body>
    </html>



    <?php }?>