
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
    <link rel="stylesheet" href="css/home.css"

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

        <div class="content-center">
            <table border=0>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total price</th>
                <th>Details</th>
            </tr>
            <?php
                $result = getAssets($con, $user_data["id"]);
                if ($result == null) {
                    exit("0");
                }
                $i = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tr style='background-color:";
                    if ($i % 2 == 0) {
                        echo "#f2f2f2";
                    } else {
                        echo "white";
                    }
                    $i++;
                    echo "'>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["category"] . '</td>';
                    echo '<td>'. $row['quantity'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>' . $row['quantity']*$row['price'] . '</td>';
                    echo '<td>' . $row['details'] . '</td>';
                    echo "<td><img src='images/icons/edit.png' height=24/>";
                    echo "<img src='images/icons/delete.ico' height=24/></td>";
                    echo '</tr>';
                }
            ?>
            </table>
        </div>
                
        <span id="footer"><hr />&#169; 2016</span>

    </div>



</body>
    </html>



    <?php }?>