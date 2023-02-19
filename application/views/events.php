<?php
include '../conf/db.php';
session_start();
$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = ' $id_user'");
$profile_v = mysqli_fetch_assoc($select);

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$size_page = 3;
$offset = ($pageno - 1) * $size_page;

$pages_sql = "SELECT COUNT(*) FROM `events`";
$result = mysqli_query($connect, $pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $size_page);

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
                <ul>
                    <li><a href="/index.php">Главная</a></li>
                    <li><a href="events.php">Мероприятия</a></li>
                    <li><a href="contacts.php">О нас</a></li>
                </ul>
                <div class="vr2"></div>
            </div>
            <?php if (!empty($_SESSION['user'])): ?>
                <div class="action" style="padding-left: 10%">
                    <div class="profile_small" onclick="menuToggle()">
                        <img src="<?="/img/uploads/" . $profile_v['img'] ?>" alt="">
                    </div>
                    <div class="menu">
                        <h3>
                            <?= $profile_v['fio'] ?>
                        </h3>
                        <ul>
                            <li><img src="/img/assets/user.png" alt=""><a href="../views/profile_volun.php">Личный
                                    кабинет</a></li>
                            <li><img src="/img/assets/edit.png" alt=""><a href="../views/edit_volun.php">Редактировать
                                    профиль</a></li>
                            <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (empty($_SESSION['user'])): ?>
                <a href="/application/views/authorisation.php" class="auth-btn">Вход</a>
                <div class="reg-block">
                    <a href="/application/views/reg_volunter.php" class="reg-btn">Регистрация</a>
                </div>
            <?php endif; ?>
        </nav>
    </section>

    <section class="event_more">
        <?php if (!empty($_SESSION['user'])): ?>
            <h1>Мероприятия</h1>

            <div class="event-container">
                <div class="filtr">
                    <h4>Поиск по дате</h4>
                    <form action="" method="POST" class="filtr_by_date">
                        <div class="form-group">
                            <label>Дата начала</label>
                            <input type="date" name="from_date" value="<?php if (isset($_POST['from_date'])) {
                                echo $_POST['from_date'];
                            } ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Дата окончания</label>
                            <input type="date" name="to_date" value="<?php if (isset($_POST['to_date'])) {
                                echo $_POST['to_date'];
                            } ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><img src="/img/assets/search.png" alt=""></button>
                            <a href="events.php"><img src="/img/assets/reload.png" alt=""></a>
                        </div>

                    </form>
                </div>

                <div class="container-events">
                    <div class="row-events">
                        

                        <?php

                        if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
                            $from_date = $_POST['from_date'];
                            $to_date = $_POST['to_date'];

                            $sql = "SELECT * FROM `events` WHERE date(`data_start`) = '$from_date' and date(`data_finish`) = '$to_date' LIMIT $offset, $size_page ";

                            $res_data = mysqli_query($connect, $sql);

                            if (mysqli_num_rows($res_data) > 0) {
                                foreach ($res_data as $event) {
                                    ?>
                                    <div class="col-events">
                                        <h4>
                                            <?= $event['nazvanie'] ?>
                                        </h4>
                                        <p class="task_events">Задачи волонтера:</p>
                                        <p class="task_events">
                                            <?= $event['task'] ?>
                                        </p>
                                        <hr>
                                        <p class="adres_events"><img src="/img/assets/819865.png" alt="">
                                            <?= $event['adres_events'] ?>
                                        </p>
                                        <p class="adres_events"><img src="/img/assets/calendar.png" alt="">
                                            <?= $event['data_start'] ?> -
                                            <?= $event['data_finish'] ?>
                                        </p>
                                        <div class="btn_events">
                                            <a href="../core/zayavka.php?id=<?= $event['id_events'] ?>"
                                                class="btn_zayavka_events">Подать
                                                заявку</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "No Record Found";
                            }
                        } else {
                            $sql = "SELECT * FROM `events` LIMIT $offset, $size_page ";

                            $res_data = mysqli_query($connect, $sql);

                            if (mysqli_num_rows($res_data) > 0) {
                                foreach ($res_data as $event) {
                                    ?>
                                    <div class="col-events">
                                        <h4>
                                            <?= $event['nazvanie'] ?>
                                        </h4>
                                        <p class="task_events">Задачи волонтера:</p>
                                        <p class="task_events">
                                            <?= $event['task'] ?>
                                        </p>
                                        <hr>
                                        <p class="adres_events"><img src="/img/assets/819865.png" alt="">
                                            <?= $event['adres_events'] ?>
                                        </p>
                                        <p class="adres_events"><img src="/img/assets/calendar.png" alt="">
                                            <?= $event['data_start'] ?> -
                                            <?= $event['data_finish'] ?>
                                        </p>
                                        <div class="btn_events">
                                            <a href="../core/zayavka.php?id=<?= $event['id_events'] ?>"
                                                class="btn_zayavka_events">Подать
                                                заявку</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <ul class="pagination">
                        <li><a href="?pageno=1">В начало</a></li>
                        <li class="<?php if ($pageno <= 1) {
                            echo 'disabled';
                        } ?>">
                            <a href="<?php if ($pageno <= 1) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno - 1);
                            } ?>">Предыдущая</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                            echo 'disabled';
                        } ?>">
                            <a href="<?php if ($pageno >= $total_pages) {
                                echo '#';
                            } else {
                                echo "?pageno=" . ($pageno + 1);
                            } ?>">Следующая</a>
                        </li>
                        <li><a href="?pageno=<?php echo $total_pages; ?>">В конец</a></li>
                    </ul>
                </div>


            </div>

        <?php endif; ?>

        <?php if (empty($_SESSION['user'])): ?>
            <p style="padding-top: 10%; padding-bottom: 10%; padding-left: 30%"><a
                    href="/application/views/authorisation.php">Войдите</a> или <a
                    href="/application/views/reg_volunter.php">зарегистрирутесь</a> чтобы увидеть все мероприятия</p>
        <?php endif; ?>

    </section>




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
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>

    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active');
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="scripts.js"></script>
</body>

</html>