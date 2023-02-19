<?php

session_start();

//Подлючаю базу данных
include("../conf/db.php");

$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
$profile_v = mysqli_fetch_assoc($select);


$fk = $_GET['id'];

if (!empty($_SESSION['user'])) {
    mysqli_query($connect, "INSERT INTO `zayavka`(`id_zayavka`, `fk_volonter`, `fk_events`, `status`) VALUES (NULL, '$profile_v[id_volonter]','$fk','progress')");

    
    header('location: ../views/volunteer_event.php');
    
} else {
    header('location: ../views/reg_volunter.php');
}



?>