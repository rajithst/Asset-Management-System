<?php
function addAsset($con, $asset_data) {
    $fields='`' .implode('`,`' ,array_keys($asset_data)) . '`';
    $data = '\'' . implode('\', \'' ,$asset_data ) . '\' ';

    mysqli_query($con,"INSERT INTO assets($fields) VALUES ($data)");
}



function output_errors($errors) {
    return '<ul style="list-style:none;"><li>'. implode('</li><li>',$errors) . '</li></ul>';
}
?>