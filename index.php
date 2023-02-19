<?php
include 'application/conf/db.php';
session_start();
$id_user = $_SESSION['user']['id_user'];


$select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
$profile_v = mysqli_fetch_assoc($select);

$organizator = mysqli_query($connect, "SELECT COUNT(*) FROM `user` WHERE `role`='organizator'");
$org_num = mysqli_fetch_assoc($organizator);

$volonter = mysqli_query($connect, "SELECT COUNT(*) FROM `user` WHERE `role`='volonter'");
$vol_num = mysqli_fetch_assoc($volonter);

$event = mysqli_query($connect, "SELECT COUNT(*) FROM `events`");
$event_num = mysqli_fetch_assoc($event);

$sql = "SELECT * FROM `events` LIMIT 3";
$result = mysqli_query($connect, $sql);
$events = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- styles -->
    <link rel="stylesheet" href="css/style.css">

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
    <section class="header wow animate__animated animate__slideInDown">
        <nav>
            <a href="index.php"><img src="img/assets/logo.png"></a>
            <p>Volunteer</p>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="application/views/events.php">Мероприятия</a></li>
                    <li><a href="application/views/contacts.php">О нас</a></li>
                </ul>
            </div>

            <?php if (!empty($_SESSION['user'])): ?>
                <div class="action" style="padding-left: 10%">
                    <div class="profile_small" onclick="menuToggle()">
                        <img src="<?="img/uploads/" . $profile_v['img'] ?>" alt="">
                    </div>
                    <div class="menu">
                        <h3>
                            <?= $profile_v['fio'] ?>
                        </h3>
                        <ul>
                            <li><img src="img/assets/user.png" alt=""><a href="application/views/profile_volun.php">Личный
                                    кабинет</a></li>
                            <li><img src="img/assets/edit.png" alt=""><a
                                    href="application/views/edit_volun.php">Редактировать профиль</a></li>
                            <li><img src="img/assets/logout.png" alt=""><a href="application/core/logout.php">Выйти</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($_SESSION['user'])): ?>
                <a href="application/views/authorisation.php" class="auth-btn">Вход</a>
                <div class="reg-block">
                    <a href="application/views/reg_volunter.php" class="reg-btn">Регистрация</a>
                </div>
            <?php endif; ?>
        </nav>
    </section>

    <!------ info ------>

    <section class="info">
        <div class="info-container">
            <div class="info-item1">
                <h1 class="main_in wow animate__animated animate__fadeInLeft">Платформа добрых дел</h1>
            </div>

            <div class="info-item2">
                <p class="animate__animated animate__fadeInLeft">Вы хотите помочь и не знаете куда обратиться?
                    Присоединяйтесь к нам и у вас будет выбор проверенных
                    нами
                    волонтерских вакансий!</p>
                <a href="application/views/reg_volunter.php"
                    class="more-btn animate__animated animate__fadeInLeft">Стать волонтером</a>
            </div>
            <div class="info-item3">
                <div class="main1 animate__animated animate__fadeIn">
                    <img src="img/main3.jpg" alt="">
                </div>
            </div>
            <div class="info-item4">
                <div class="main2 animate__animated animate__fadeIn">
                    <img src="img/main2.jpg" alt="">
                </div>
            </div>
            <div class="info-item5">
                <div class="main3 animate__animated animate__fadeIn">
                    <img src="img/main1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- number -->
    <section class="number">
        <div class="work wow animate__animated animate__zoomIn">
            <div class="work-header">
                <img src="img/assets/suitcase.png" style="width: 50px;" alt="">
                <h1>
                    <?= $event_num['COUNT(*)'] ?>
                </h1>
            </div>
            <p>Вакансий</p>
        </div>
        <div class="event wow animate__animated animate__zoomIn">
            <div class="event-header">
                <img src="img/assets/business.png" style="width: 50px;" alt="">
                <h1>
                    <?= $event_num['COUNT(*)'] ?>
                </h1>
            </div>
            <p>Мероприятий</p>
        </div>
        <div class="organisation wow animate__animated animate__zoomIn">
            <div class="organisation-header">
                <img src="img/assets/businessman.png" style="width: 50px;" alt="">
                <h1>
                    <?= $org_num['COUNT(*)'] ?>
                </h1>
            </div>
            <p>Организаций</p>
        </div>
        <div class="volonteers wow animate__animated animate__zoomIn">
            <div class="volonteers-header">
                <img src="img/assets/work-from-home.png" style="width: 50px;" alt="">
                <h1>
                    <?= $vol_num['COUNT(*)'] ?>
                </h1>
            </div>
            <p>Волонтеров</p>
        </div>

    </section>


    <!------ what we can ------>

    <section class="can wow animate__animated animate__fadeInUp">
        <div class="can-header">
            <h1 id="top">Возможности</h1>
            <hr>
            <a href="#"><img src="img/assets/button.png" alt="" class="btn_can"></a>
        </div>
        <div class="grid-container wow animate__animated animate__zoomIn">
            <div class="item2">
                <h1>Волонтерам</h1>
                <p>Станьте волонтером, чтобы помогать другим и получать уникальный опыт</p>
                <a href="application/views/reg_volunter.php" class="btn_vol">Стать волонтером</a>
            </div>
            <div class="item3">
                <img src="img/assets/lupa.png" alt="">
                <p>Найдите мероприятие или проект в системе</p>
            </div>
            <div class="item4">
                <img src="img/assets/doc.png" alt="">
                <p>Найдите мероприятие или проект в системе</p>
            </div>
            <div class="item5">
                <img src="img/assets/people.png" alt="">
                <p>Найдите мероприятие или проект в системе</p>
            </div>
            <div class="item6">
                <img src="img/assets/comp.png" alt="">
                <p>Найдите мероприятие или проект в системе</p>
            </div>
        </div>
        <div class="grid-container1 wow animate__animated animate__zoomIn">
            <div class="item11">
                <h1>Организаторам</h1>
                <p class="info_c">Зарегистрируйтесь, как организатор, чтобы получать поддержку на развитие инициатив</p>
                <a href="application/views/reg_organiz.php" class="btn_org">Стать организатором</a>
            </div>
            <div class="item7">
                <img src="img/assets/calendarwithdate.png" alt="">
                <p>Создайте мероприятие и вакансии для добровольцев</p>
            </div>
            <div class="item8">
                <img src="img/assets/people.png" alt="">
                <p>Найдите тех, кто поможет в вашем добром деле</p>
            </div>
            <div class="item9">
                <img src="img/assets/com.png" alt="">
                <p>Отберите волонтёров</p>
            </div>
        </div>
    </section>

    <!------ steps ------>
    <section class="steps wow animate__animated animate__fadeIn">
        <div class="steps-container">
            <div class="steps-item1">
                С чего начать?
            </div>
            <div class="tab-container">
                <div class="tab-main" id="tab-main">
                    <button class="tablinks-main active" onclick="openCity(event, 'org')">Для организаторов</button>
                    <button class="tablinks-main" onclick="openCity(event, 'vol')">Для волонтеров</button>
                </div>
            </div>
            <div id="org" class="tabcontent-main" style="display: block;">
                <div class="org-container">
                    <div class="item1-org wow animate__animated animate__zoomIn">
                        <img src="img/assets/number-1.png" alt="">
                        <div class="text-org">
                            <p>Шаг 1</p>
                            <h1>Создать аккаунт</h1>
                        </div>

                    </div>
                    <div class="item2-org wow animate__animated animate__zoomIn">
                        <img src="img/assets/number-2.png" alt="">
                        <p>Шаг 2</p>
                        <h1>Создать мероприятие</h1>
                    </div>
                    <div class="item3-org  wow animate__animated animate__zoomIn">
                        <img src="img/assets/number-3.png" alt="">
                        <p>Шаг 3</p>
                        <h1>Подождать пока откликнуться волонтеры</h1>
                    </div>
                    <div class="item4-org wow animate__animated animate__zoomIn">
                        <img src="img/assets/number-4.png" alt="">
                        <p>Шаг 4</p>
                        <h1>Принять помощь от волонтера</h1>
                    </div>
                    <div class="item5-org wow animate__animated animate__zoomIn">
                        <img src="img/assets/number-5.png" alt="">
                        <p>Шаг 5</p>
                        <h1>Встретить с волонтером на мероприятии</h1>
                    </div>
                </div>
            </div>
            <div id="vol" class="tabcontent-main">
                <div class="org-container">
                    <div class="item1-org animate__animated animate__zoomIn">
                        <img src="img/assets/number-1.png" alt="">
                        <p>Шаг 1</p>
                        <h1>Создать аккаунт</h1>
                    </div>
                    <div class="item2-org animate__animated animate__zoomIn">
                        <img src="img/assets/number-2.png" alt="">
                        <p>Шаг 2</p>
                        <h1>Выбрать подходящее мероприятие</h1>
                    </div>
                    <div class="item3-org animate__animated animate__zoomIn">
                        <img src="img/assets/number-3.png" alt="">
                        <p>Шаг 3</p>
                        <h1>Подождать отклик на заявку</h1>
                    </div>
                    <div class="item4-org animate__animated animate__zoomIn">
                        <img src="img/assets/number-4.png" alt="">
                        <p>Шаг 4</p>
                        <h1>Проверить личный кабинет на наличие заявок</h1>
                    </div>
                    <div class="item5-org animate__animated animate__zoomIn">
                        <img src="img/assets/number-5.png" alt="">
                        <p>Шаг 5</p>
                        <h1>Встретить с организатором на мероприятии</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!------ events ------>
    <section class="events wow animate__animated animate__fadeInUp">
        <div class="events-header">
            <h1>Мероприятия</h1>
            <hr>
            <a href="#"><img src="img/assets/button.png" alt="" class="btn_can"></a>

        </div>
        <div class="row">
            <div class="container">
                <?php foreach ($events as $event): ?>
                    <div class="col wow animate__animated animate__fadeInUp">
                        <h4>
                            <?= $event['nazvanie'] ?>
                        </h4>
                        <p class="task_org">Задачи волонтера:</p>
                        <p class="task_bd">
                            <?= $event['task'] ?>
                        </p>
                        <hr>
                        <p class="adres_ev"><img src="img/assets/819865.png" alt="">
                            <?= $event['adres_events'] ?>
                        </p>
                        <p class="adres_ev"><img src="img/assets/calendar.png" alt="">
                            <?= $event['data_start'] ?> -
                            <?= $event['data_finish'] ?>
                        </p>
                        <a href="application/core/zayavka.php?id=<?= $event['id_events'] ?>" class="btn_zayavka">Подать
                            заявку</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="button-e">
            <a href="application/views/events.php" class="btn_e">Посмотреть все</a>
        </div>
    </section>

    <!-- Back to top button -->
    <a id="button"><img src="img/assets/upload.png" style=" width: 30px"></img></a>

    <!------ footer ------>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>