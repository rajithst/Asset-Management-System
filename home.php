
<?php require 'core/init.php';

if(logged_in() === false){

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
            <a title="asset" href="">
                <div class="logo">
                    <img src="images/logo.png" height="66px" weight="66px" />
                    <span id="title">Asset Management System</span>
                </div>
            </a>

            <nav>


                    <label for="email">Welcome <?php echo $user_data['first_name']; ?> </label>

                <input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/>
                <a href="<?php echo $user_data['first_name'];?>"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
                <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>


            </nav>


        </header>

		<div class="assets">

            <a href="add.php">add items</a>

		</div>



        <hr />
        <span id="footer">&#169; 2016</span>

    </div>



</body>
    </html>



    <?php }?>