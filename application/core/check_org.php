<?php
    //Подключение сессии
    session_start();

    //Подключение к БД
    require_once '../conf/db.php';
    $id_user=$_SESSION['user']['id_user'];

    //Заношу под переменные то, чтобы было введено пользователем в edit
    $nazvanie_org = $_POST['nazvanie_org'];
    $adres = $_POST['adres'];
    $tel = $_POST['tel'];
    $opisanie = $_POST['opisanie'];

        mysqli_query($connect, "INSERT INTO `organizator`(`id_organiz`, `nazvanie_org`, `adres`, `opisanie`, `fk_user`, `tel`) VALUES (NULL,'$nazvanie_org','$adres','$opisanie','$id_user',' $tel')");
        
        header('location: ../views/profile_organ.php');


?>