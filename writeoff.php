<?php
require 'core/init.php';
ini_set('display_errors', 1);
error_reporting(~0);
if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css">
    <link rel="stylesheet" href="css/home.css" />

</head>
<body>

<div id="page">
    <header>
        <a title="asset" href="home.php">
            <div class="logo">
                <img src="images/logo.png" height="66px" weight="66px" />
                <span id="title">Asset Management System</span>
            </div>
        </a>

        <nav>


            <label for="email">Welcome <?php echo $user_data['first_name']; ?> </label>

            <a href="home.php"><input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/></a>
            <a href="profile.php"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
            <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>


        </nav>


    </header>

    <?php

    	if (empty($_POST) === false){
    		$quantity = $_POST['quantity'];
    		$id = $_POST['id'];;
    		writeoff_data($con, $id,$quantity);
        	header('Location:home.php');
    	}else{

    		$id=$_GET['id'];
	        $title=$_GET['title'];
	        $max=$_GET['max'];


        
?>

    
    <div class="content-center">
        <div id="topic"><h3>Do you want to Write off this Asset? </h3></div>
        <form name="add-asset" method='POST' action='writeoff.php'>
	        <table border=0 id="table">
			    <tr>
			    	
			        <th>Title</th>
			        <th>Current Quantity</th>
			        <th>Write Off Quantity</th>
			        <th>Action</th>
			        

			    </tr>
			    <tr>
			    	<td style='text-align: center'><?php echo $title; ?> </td>
			    	<input type="hidden" name='id' value="<?php echo $id; ?>">

			    	<td style='text-align: center'><?php echo $max ?> </td>
			    	<td style='text-align: center'><input type="number" name="quantity" placeholder="Quantity" max="<?php echo $max; ?>"> </td>
			    	<td style='text-align: center'> <input type='submit' value='Submit' name='writeoff_asset'> </td>
			    </tr>
			</table>
		</form>

    </div>

</div>
<?php } ?>
</body>
</html>
