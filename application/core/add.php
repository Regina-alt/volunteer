<?php
$nazvanie = $_POST['nazvanie'];
$task = $_POST['task'];
$adres_events = $_POST['adres_events'];
$data_start = $_POST['data_start'];
$data_finish = $_POST['data_finish'];
$chas = $_POST['chas'];

include '../conf/db.php';
session_start();
$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `organizator` WHERE `fk_user` = '$id_user'");
$profile_o = mysqli_fetch_assoc($select);
$fk_organiz = $profile_o['id_organiz'];

    $r = mysqli_query($connect, "INSERT INTO `events`(`id_events`, `nazvanie`, `task`, `adres_events`, `data_start`, `data_finish`, `fk_organiz`, `chas`) VALUES (null,'$nazvanie','$task','$adres_events','$data_start','$data_finish','$fk_organiz','$chas')");
    if ($r == 'true') {
        echo "<meta http-equiv='refresh'>";	
        header('Location: ../views/profile_organ.php');		
    } else {
        echo "<script>alert('Ошибка')</script>";
       
    }


?>