<?php require 'core/init.php';

if(logged_in() === false){

    session_destroy();
    header('Location:index.php');
    exit();

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Asset Management System</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/screen.css">
    <link rel='stylesheet' href='css/input_form.css'>


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

                <a href="<?php echo $user_data['first_name'];?>"><input type="image" src="images/icons/user.png" name="setting" value="settings " style="margin-left:10px;font-weight:bold;"/></a>
                <a href="logout.php"><input type="image" src="images/icons/logout.png" name="logout" value="Sign Out" style="margin-left:10px;font-weight:bold;"/></a>


            </nav>


        </header>

        <div id='add-item-form'>
            <form method='POST' action='add.php'>
                <table border=0>
                    <tr>
                        <td id='label-col'>
                            <label>Title</label> </td>
                        <td id='input-col'>
                            <input type='text' name='title'> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Category</label></td>
                        <td id='input-col'>
                            <select name='category'>
                                <option value='chair'>Chair</option>
                                <option value='desk'>Desk</option>
                                <option value='cupboad'>Cupboard</option>
                            </select>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Quantity</label></td>
                        <td id='input-col'>
                            <input type='text' name='quantity'></td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Price</label> </td>
                        <td id='input-col'>
                            <input type='text' name='price'> </td>
                    </tr>
                    <tr>
                        <td id='label-col'>
                            <label>Additional details</label> </td>
                        <td id='input-col'>
                            <textarea name='details' rows='10'></textarea> </td>
                    </tr>                    
                </table> 
                <input type='submit' value='Add' name='add_asset'>
            </form>
        </div>

        <hr />
        <span id="footer">&#169; 2016</span>

    </div>

    <?php
    if(isset($_POST['add_asset'])) {
        $asset_data = array (
            'userid' => $user_data['id'],
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'quantity' => $_POST['quantity'],
            'price' => $_POST['price'],
            'details' => $_POST['details']
        );

        addAsset($con, $asset_data);
        header('Location:home.php');
        exit();
    }
    ?>

</body>
</head>