<?php
function addAsset($con, $asset_data) {
    $fields='`' .implode('`,`' ,array_keys($asset_data)) . '`';
    $data = '\'' . implode('\', \'' ,$asset_data ) . '\' ';

    mysqli_query($con,"INSERT INTO assets($fields) VALUES ($data)");
}

function getAssets($con, $userid) {
    $sql = "SELECT * FROM assets WHERE userid=$userid";
    $result = $con->query($sql);
    if ($result->num_rows == 0) {
        return false;
    }
    return $result;
}

function output_errors($errors) {
    return '<ul style="list-style:none;"><li>'. implode('</li><li>',$errors) . '</li></ul>';
}
?>