<?php
include '../conf/db.php';
session_start(); //Начало сессии
$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
$profile_v = mysqli_fetch_assoc($select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">

    <!-- title -->
    <title>Volunteer</title>

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
<section class="header">
        <nav>
            <a href="/index.php"><img src="/img/assets/logo.png"></a>
            <p>Volunteer</p>
            <div class="nav-links" id="navLinks">
                <div class="vr1"></div>
                <ul style="padding-right: 20%">
                    <li><a href="/index.php">Главная</a></li>
                    <li><a href="events.php">Мероприятия</a></li>
                    <li><a href="contacts.php">О нас</a></li>
                </ul>
                <div class="vr2"></div>
            </div>
            <div class="action">
                <div class="profile_small" onclick="menuToggle()">
                    <img src="<?="/img/uploads/" . $profile_v['img'] ?>" alt="">
                </div>
                <div class="menu">
                    <h3>
                        <?= $profile_v['fio'] ?>
                    </h3>
                    <ul>
                        <li><img src="/img/assets/user.png" alt=""><a href="profile_volun.php">Личный кабинет</a></li>
                        <li><img src="/img/assets/edit.png" alt=""><a href="edit_volun.php">Редактировать профиль</a></li>
                        <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a></li>
                    </ul>
                </div>
            </div>

        </nav>

    </section>

    <section class="edit">
        <h1>Редактировать профиль</h1>
        <form action="../core/edit.php" method="POST" enctype="multipart/form-data" class="form_reg">
            <p>№</p>
            <input type="text" name="id_volonter" value="<?= $profile_v['id_volonter'] ?>" readonly>
            <p>ФИО</p>
            <input type="text" name="fio" value="<?= $profile_v['fio'] ?>">
            <p>Дата рождения</p>
            <input type="date" name="date_birthday" value="<?= $profile_v['date_birthday'] ?>">
            <p>Телефон</p>
            <input type="tel" name="tel" value="<?= $profile_v['tel'] ?>">
            <p>Адрес жительства</p>
            <input type="text" name="adres_zitel" value="<?= $profile_v['adres_zitel'] ?>">
            <p>Изображение профиля</p>
            <input type="file" name="img_profile">
            </br>
            <button type="submit">Подтвердить</button>
        </form>

    </section>


    <footer>
        <div class="footer">
            <div class="adresa">
                <p>Адреса офисов:</p>
                <p>г. Москва. ул Шухова, д.17, корп.2</p>
                <p>г. Калининград ул Чаадаева, д.31</p>
                <p>г. Калининград ул Мореходная, д.2</p>
            </div>
            <div class="email">
                <p>Почта технической поддержки:</p>
                <a href="#">info@volunteer.ru</a>
            </div>
            <div class="me">
                <p>Сайт создан в качестве курсового проекта студенткой группы 19-ИС-24 Мигачевой Региной</p>
            </div>
        </div>
        <div class="links_b">
            <a href="#">Пользовательские соглашения</a>
            <a href="#">Правила пользования</a>
            <a href="#">Политика конфиденциальности</a>
        </div>
    </footer>


    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active');
        }
    </script>
</body>

</html>