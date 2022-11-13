<?php
    //Подключение к БД
    $connect = mysqli_connect('localhost', 'root', '', 'volunteer');
    if(!$connect){
        die('Error connect to database');
    }
?>