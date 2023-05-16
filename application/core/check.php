<?php
    //Подключение сессии
    session_start();

    //Подключение к БД
    require_once '../conf/db.php';
    $id_user=$_SESSION['user']['id_user'];

    //Заношу под переменные то, чтобы было введено пользователем в edit
    $fio = $_POST['fio'];
    
    $date_birthday = date('Y-m-d', strtotime($_POST['date_birthday']));;
    $adres_zitel = $_POST['adres_zitel'];
    $tel = $_POST['tel'];
    //Загружаю картинку
    if(!empty($_FILES['img_profile'])){
        $name = $_FILES['img_profile']['name'];
        $tmp_name = $_FILES['img_profile']['tmp_name'];
        move_uploaded_file($tmp_name, "C:/OSPanel/domains/volunteer.local/img/uploads" . $name);
        
    }
    if(!empty($_FILES['img_profile'])){
        $name = $_FILES['img_profile']['name'];
        $tmp_name = $_FILES['img_profile']['tmp_name'];
        move_uploaded_file($tmp_name, "C:/Volunteer/application/menu/sourse/uploads/" . $name);
        
    }
    
        mysqli_query($connect, "INSERT INTO `volonter`(`id_volonter`, `fio`, `adres_zitel`, `date_birthday`, `otrabot_chas`, `kol_meropr`, `fk_user`, `img`, `tel`) VALUES (NULL,'$fio','$adres_zitel','$date_birthday','0','0','$id_user','$name','$tel')");
        
        header('location: ../views/profile_volun.php');


?>