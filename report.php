<?php
require 'core/init.php';
error_reporting(0);

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
    <script src="js/activation.js"></script>

</head>
<body>
<script type="text/javascript">
    function exportF(elem) {
      var table = document.getElementById("table");
      var html = table.outerHTML;
      var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
      elem.setAttribute("href", url);
      elem.setAttribute("download", "export.xls"); // Choose the file name
      return false;
}
</script>

<div id="page">
    <header>
        <a title="asset" href="home.php">
            <div class="logo">
                <img src="images/logo.png" height="66px" weight="66px" />
        </a>

        <span id="title">Asset Management System</span>
</div>
<nav>
    <label for="email"><?php echo $user_data['first_name']; ?> </label>

    <a href="home.php"><input type="image" src="images/icons/home.png" title="home" value="Home" style="margin-left:10px;"/></a>
    <a href="profile.php"><input type="image" src="images/icons/user.png" title="Profile" value="settings " style="margin-left:10px;"/></a>
    <a href="logout.php"><input type="image" src="images/icons/logout.png" title="Logout" value="Sign Out" style="margin-left:10px;"/></a>

</nav>

</header>

<?php
$id = $user_data['id'];
$asset_data=getAssets($con,$id);
?>

<div class="content-center">
    <div id="topic"> General Report</div>
<table border=0 id="table">
    <tr>

        <th>Category</th>
        <th>Quantity</th>
        <th>Total price</th>

    </tr>
    <?php
    $fileName = "members-data_" . date('Y-m-d') . ".xls"; 
    $fields = array('Category','quantity','Total Price'); 
    $excelData = implode("\t", array_values($fields)) . "\n"; 
    $id = $user_data['id'];
    $cat= array(
        'chair',
        'desk',
        'cupboad',
        'machinery and equipment'
    );
    $tcount=0;
    $tprice=0;
    foreach($cat as $values){

        $count = getCount($con,$values,$id);
        $tcount= $tcount+$count;
        $price = getPrice($con,$values,$id);
        $tprice= $tprice+$price;
        $lineData = array($cat, $count,$price); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        ?><tr><?php
        echo "<td style='text-align: center'>" . $values . "</td>";
        echo "<td style='text-align: center'>" .$count. "</td>";
        echo "<td style='text-align: center'>".'Rs '.$price."</td>";

        }?>
    </tr>
</table>
    <div class="summary" style="margin: 10% auto; text-align: center">
    <h2>TOTAL ASSETS = <?php echo $tcount; ?></h2>
    <h2>TOTAL ASSETS WORTH = Rs. <?php echo $tprice;?>/=</h2>
    <button id="btnExport" onclick="exportF(this)">EXPORT REPORT</button>
    </div>
   




</div>

</body>
</html>


