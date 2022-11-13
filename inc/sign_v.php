<?php
    //Подключение сессии
    session_start();

    //Подключение к БД
    require_once 'db.php';


    //Заношу под переменные то, чтобы было введено пользователем в edit
    $login = $_POST['login'];
    $password_g = $_POST['password_g'];
    $password_ag = $_POST['password_ag'];

    //Если пароли совпадают продолжнаю регистрацию
    if ($password_g === $password_ag){
        
        //Произвожу добавление пользователя в базу данных
        mysqli_query($connect, "INSERT INTO `user` (`id_user`, `login`, `password`, `role`) VALUES (null, '$login', '$password_g', 'volonter')");
        

        $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password_g'");
        if (mysqli_num_rows($check_user) > 0) {
    
            $user = mysqli_fetch_assoc($check_user);
    
            $_SESSION['user'] = [
                "id_user" => $user['id_user']
            ];
        header('location: ../reg_acc.php'); //Возвращаю на страницу входа
        }
    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('location: ../reg_volunter.php'); //Если не совпадают пароли, обновляю страницу
    }

?>