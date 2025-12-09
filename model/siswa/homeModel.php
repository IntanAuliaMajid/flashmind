<?php

function getWOD(){
    global $conn;
    $query = "SELECT * FROM wod WHERE aktif = '1'";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
        return mysqli_fetch_assoc($result);
    }
    
    return null;
}