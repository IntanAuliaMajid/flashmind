<?php


function getKelompok($id){
    global $conn;
    $query = "SELECT * FROM kelompok_kata WHERE user_id = $id";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    return null;
}

function insertKelompok($userId, $namaKelompok){
    global $conn;

    $stmt = mysqli_prepare($conn, "INSERT INTO kelompok_kata (user_id, nama_kelompok_kata) VALUES (?, ?)");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "is", $userId, $namaKelompok);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}

function getKelompokById($idKelompok){
    global $conn;
    $query = "SELECT * FROM kelompok_kata WHERE id_kelompok_kata = ?";
    $stmt = mysqli_prepare($conn, $query);
    if(!$stmt){
        return null;
    }

    mysqli_stmt_bind_param($stmt, "i", $idKelompok);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    return $row;
}

function editKelompok($idKelompok, $namaKelompok){
    global $conn;

    $stmt = mysqli_prepare($conn, "UPDATE kelompok_kata SET nama_kelompok_kata = ? WHERE id_kelompok_kata = ?");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "si", $namaKelompok, $idKelompok);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}

function deleteKelompok($idKelompok){
    global $conn;

    $stmt = mysqli_prepare($conn, "DELETE FROM kelompok_kata WHERE id_kelompok_kata = ?");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $idKelompok);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}