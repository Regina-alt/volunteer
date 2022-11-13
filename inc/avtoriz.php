<?php
    //Начало сессии
    session_start();

    //Подлючаю базу данных
    include ("db.php");

    //Заношу под переменные то, чтобы было введено пользователем в edit
    $login = $_POST['login'];
    $password = $_POST['password_v'];
    
    $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id_user" => $user['id_user'],
            "login" => $user['login'],
            "role" => $user['role']
        ];

        if ($user['role'] == 'volonter'){
            header('Location: ../profile_volun.php');
        } else if ($user['role'] == 'organizator'){
            header('Location: ../profile_organ.php');
        } else{
            header('Location: ../admin/admin_panel.php');
        } //Переношу на страницу профиля

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../authorisation.php'); //В случае неудачи, возвращаю на начальную страницу
    }


    ?>
