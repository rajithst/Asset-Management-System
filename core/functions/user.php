<?php


function logged_in(){

    return(isset($_SESSION['id'])) ? true : false;

}

function user_id_from_email($con,$email){

    $sql = "SELECT `id` FROM `users`  WHERE `email` = '$email'";
    $query = mysqli_query($con,$sql);
    $fetcharray=mysqli_fetch_array($query,MYSQLI_NUM);
    return $fetcharray[0];

}

function login($con,$email,$password){

    $user_id= user_id_from_email($con,$email);
    $password = md5($password);

    $query=mysqli_query($con,"SELECT * FROM `users` WHERE `email`= '$email' AND `password`='$password'");
    $result=mysqli_num_rows($query);
    return ($result==1) ? $user_id :false;



}


function register_user($con,$register_data){

    $register_data['password']= md5($register_data['password']);
    $fields='`' .implode('`,`' ,array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'' ,$register_data ) . '\' ';


    mysqli_query($con,"INSERT INTO `users`($fields) VALUES ($data)");

}





?>