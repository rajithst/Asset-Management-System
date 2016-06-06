<?php

function register_user($con,$register_data){


    $fields='`' .implode('`,`' ,array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'' ,$register_data ) . '\' ';


    mysqli_query($con,"INSERT INTO `users`($fields) VALUES ($data)");






}

?>