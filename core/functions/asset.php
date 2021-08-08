<?php

function addAsset($con, $asset_data) {
    $fields='`' .implode('`,`' ,array_keys($asset_data)) . '`';
    $data = '\'' . implode('\', \'' ,$asset_data ) . '\' ';

    mysqli_query($con,"INSERT INTO assets($fields) VALUES ($data)");
}



function asset_data($con,$id){
        $data =array();
        $id= (int)$id;
        $res=mysqli_query($con,"SELECT `id`,`title`,`category`,`quantity`,`price`,`details` FROM `assets` WHERE `id`= $id");
            $data = mysqli_fetch_assoc($res);
            return $data;

}


function total($con,$id){
    $sql= "SELECT * FROM `assets` WHERE `userid`=$id";
    $res = mysqli_query($con,$sql);
    $tot= mysqli_num_rows($res);
    return $tot;
}

function getAssets($con, $userid) {
    $sql = "SELECT * FROM assets WHERE userid=$userid";
    $res = mysqli_query($con,$sql);
    return  $con->query($sql);
}

function getWriteOffAssets($con, $userid) {
    $sql = "SELECT * FROM assets WHERE userid=$userid AND status=0";
    $res = mysqli_query($con,$sql);
    return $con->query($sql);
}

function output_errors($errors) {
    return '<ul style="list-style:none;"><li>'. implode('</li><li>',$errors) . '</li></ul>';
}


function update_assets($con,$update_data,$id){
    $update = array();
    foreach($update_data as $field=>$data){
        $update[]= '`'. $field. '`=\''.$data.'\'';
    }

    mysqli_query($con,"UPDATE `assets` SET" . implode(', ',$update) .  " WHERE `id`=$id");


}


function delete_data($con,$id){

    $query = "DELETE FROM `assets` WHERE `id`= $id";
    mysqli_query($con,$query);
}

function delete_writeoff_data($con,$id){

    $query = "UPDATE `assets` SET `writeoff_quantity`=0,`writeoff_date`=NULL WHERE `id`='$id'";
    print_r($query);
    mysqli_query($con,$query);
}

function writeoff_data($con,$id,$quantity){

    $sql = "SELECT * FROM `assets` WHERE `id`='$id'";
    $res = mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($res);
    $current_wo = $row["writeoff_quantity"];
    $newQ = $current_wo+$quantity;

    $dt = date('Y-m-d');
    $query = "UPDATE `assets` SET `writeoff_quantity`='$newQ',`writeoff_date`='$dt' WHERE `id`='$id'";
    print_r($query);
    mysqli_query($con,$query);
}


function getCount($con,$category,$id,$status){
    $sql = "SELECT * FROM `assets` WHERE `category`='$category' AND userid='$id'";
    $res = mysqli_query($con,$sql);

    if(mysqli_num_rows($res)>1) {
        $count=0;
        while ($row = mysqli_fetch_assoc($res)) {
            if($status==1){
                $count = $count+( $row['quantity'] - $row['writeoff_quantity']);
            }else{

                $count = $count+$row['writeoff_quantity'];
            }
            

        }

        return $count;

    } else if(mysqli_num_rows($res)==1){
        $row= mysqli_fetch_assoc($res);
        if($status==1){
            return ($row['quantity'] - $row['writeoff_quantity']);
        }else{

            return $row['writeoff_quantity'];
        }
       

    }else {
        return 0;
    }
}

function getPrice($con,$category,$id,$status){

    $sql = "SELECT * FROM `assets` WHERE `category`='$category' AND userid='$id'";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>1) {
        $price=0;
        while ($row = mysqli_fetch_assoc($res)) {
            if($status==1){
                $price = $price + ($row['price']* ( $row['quantity'] - $row['writeoff_quantity']) );
            }else{
                $price = $price + ($row['price']* ($row['writeoff_quantity']) );

            }
        }

        return $price;

    } else if(mysqli_num_rows($res)==1){
        $row= mysqli_fetch_assoc($res);
        if($status==1){
            return ($row['price']* ( $row['quantity'] - $row['writeoff_quantity']) );
        }else{
            return $row['writeoff_quantity']*$row['price'];
        }
        

    } else {
        return 0;
    }
}


?>