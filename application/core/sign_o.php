<?php
    //Подключение сессии
    session_start();

    //Подключение к БД
    require_once '../conf/db.php';


    //Заношу под переменные то, чтобы было введено пользователем в edit
    $login = $_POST['login'];
    $password_org = $_POST['password_org'];
    $password_org1 = $_POST['password_org1'];

    //Если пароли совпадают продолжнаю регистрацию
    if ($password_org === $password_org1){
        
        //Произвожу добавление пользователя в базу данных
        mysqli_query($connect, "INSERT INTO `user` (`id_user`, `login`, `password`, `role`) VALUES (null, '$login', '$password_org', 'organizator')");
        

        $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password_org'");
        if (mysqli_num_rows($check_user) > 0) {
    
            $user = mysqli_fetch_assoc($check_user);
    
            $_SESSION['user'] = [
                "id_user" => $user['id_user']
            ];
        header('location: ../views/reg_org.php'); //Возвращаю на страницу входа
        }
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('location: ../views/reg_organiz.php'); //Если не совпадают пароли, обновляю страницу
    }

?>