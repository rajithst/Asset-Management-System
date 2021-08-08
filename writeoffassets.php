
<?php 
require 'core/init.php';

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
            </a>

            <span id="title">Asset Management System</span>
    </div>
            <nav>
                    <label for="email">Welcome <?php echo $user_data['first_name']; ?> </label>

                <a href="home.php"><input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/></a>
                <a href="profile.php"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
                <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>

            </nav>

        </header>

        <div class="content-center">
            <div id="topic">Write Off Assets</div>
            

            <table border=0>
            <tr>
                <th>Writeoff Date</th>
                <th>Title</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total price</th>
                <th>Details</th>
            </tr>
            <?php
                $id = $user_data['id'];
                $result = getAssets($con, $user_data["id"]);
                $i = 1;
                while($row = $result->fetch_assoc()) {
                    if($row["writeoff_quantity"]>0){

                        echo "<tr style='background-color:";
                        if ($i % 2 == 0) {
                            echo "#f2f2f2";
                        } else {
                            echo "white";
                        }
                        $i++;
                        echo "'>";
                        echo "<td style='text-align: center'>" . $row["writeoff_date"] . "</td>";
                        echo "<td style='text-align: center'>" . $row["title"] . "</td>";
                        echo "<td style='text-align: center'>" . $row["category"] . '</td>';
                        echo '<td style="text-align: center">' . $row['writeoff_quantity'] . '</td>';
                        echo '<td style="text-align: center">' .'Rs '. $row['price'] . '</td>';
                        echo '<td style="text-align: center">'.'Rs '.$row['writeoff_quantity'] * $row['price'] . '</td>';
                        echo '<td style="text-align: center">' . $row['details'] . '</td>';
                        echo "<td style='text-align: center'><a onClick=\"javascript: return confirm('Please confirm deletion?');\" href=\"writeoffdelete.php?id=".$row['id']."\"><img src='images/icons/delete.ico' height='24'/></a></td>";
                        
                        echo '</tr>';
                    }
                    


                    
                    
            }

            ?>



            </table>
            <a href="report.php?mode=wo"><div id="report">Generate Report</div></a>
        </div>
        
    </div>
</body>
</html>
