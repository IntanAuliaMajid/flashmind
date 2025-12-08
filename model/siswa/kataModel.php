<?php

function getKataByKelompok($idKelompok){
    global $conn;
    $query = "SELECT * FROM kata WHERE kelompok_id = ? ORDER BY tanggal_dibuat DESC";
    $stmt = mysqli_prepare($conn, $query);
    if(!$stmt){
        return null;
    }

    mysqli_stmt_bind_param($stmt, "i", $idKelompok);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if($result && mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        return $data;
    }

    mysqli_stmt_close($stmt);
    return null;
}

function getKataById($idKata){
    global $conn;
    $query = "SELECT * FROM kata WHERE id_kata = ?";
    $stmt = mysqli_prepare($conn, $query);
    if(!$stmt){
        return null;
    }

    mysqli_stmt_bind_param($stmt, "i", $idKata);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    return $row;
}

function insertKata($idKelompok, $kata, $arti, $contoh){
    global $conn;

    $stmt = mysqli_prepare($conn, "INSERT INTO kata (kelompok_id, kata, arti, contoh, tanggal_dibuat) VALUES (?, ?, ?, ?, NOW())");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "isss", $idKelompok, $kata, $arti, $contoh);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}

function editKata($idKata, $kata, $arti, $contoh){
    global $conn;

    $stmt = mysqli_prepare($conn, "UPDATE kata SET kata = ?, arti = ?, contoh = ? WHERE id_kata = ?");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sssi", $kata, $arti, $contoh, $idKata);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}

function deleteKata($idKata){
    global $conn;

    $stmt = mysqli_prepare($conn, "DELETE FROM kata WHERE id_kata = ?");
    if(!$stmt){
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $idKata);
    $exec = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $exec;
}
