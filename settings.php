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


            <label for="email"> <?php echo $user_data['first_name']; ?>'s Profile </label>

            <a href="home.php"><input type="image" src="images/icons/home.png" title="Home" value="home " style="margin-left:10px;"/></a>
            <a href="<?php echo $user_data['first_name'];?>"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
            <input type="image" src="images/icons/settings.png" title="Settings" style="margin-left:10px;">
            <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>




        </nav>
    </header>

    <div class="assets">

        <div class="block" style="width: 40%;">
            <div class="image" style="border:1px solid #000000;width: 70%;height: 50%;">
                hhfhgf
            </div>
        </div>

        <div class="block" style="margin: 130px 0px 0px 65px;width: 50%; height: 60%;">

            <h2>Profile Settings</h2>

            <form action="">

                <label for="">First Name</label>
                <input id="text_input" type="text" name="fname" placeholder="First name"> <br><br>

                <label for="">Last Name</label>
                <input id="text_input" type="text" name="lname" placeholder="Last name"><br><br>

                <label for="">Pasword</label>
                <input id="text_input" type="password" name="password" placeholder="Password"><br><br>

                <label for="">Pasword again</label>
                <input id="text_input" type="password" name="password" placeholder="Password"><br><br>

                <input type="submit" name="register" value="Update" style="font-weight:bold;"> <input type="reset" name="reset" value="Reset" style="font-weight:bold;">






            </form>

        </div>



    </div>



    <hr />
    <span id="footer">&#169; 2016</span>

</div>



</body>
    </html>



<?php }?>