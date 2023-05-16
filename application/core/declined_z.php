<?php 

    session_start();

    //Подлючаю базу данных
    include ("../conf/db.php");

    $id_user=$_SESSION['user']['id_user'];
    $select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
    $profile_v = mysqli_fetch_assoc($select);


    $fk = $_GET['id'];

    if (!empty($_SESSION['user'])){
        mysqli_query($connect, "UPDATE `zayavka` SET `status`='declined' WHERE `id_zayavka`=$fk");
        header('location: ../views/profile_organ.php');
    } else {
        header('location: ../views/reg_volunter.php');
    }



?>