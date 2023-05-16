<?php
include '../conf/db.php';
session_start();
$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `organizator` WHERE `fk_user` = '$id_user'");
$profile_o = mysqli_fetch_assoc($select);

$r = mysqli_query($connect, "SELECT * FROM `zayavka`, `events`, `volonter`, `organizator` WHERE `zayavka`.`fk_volonter`=`volonter`.`id_volonter` and `zayavka`.`fk_events`=`events`.`id_events` and `events`.`fk_organiz` = `organizator`.`id_organiz` and `id_organiz`=$profile_o[id_organiz] and `zayavka`.`status`='progress'");
$myrow = mysqli_fetch_array($r);
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
                <ul style="padding-right: 10%;">
                    <li><a href="/index.php">Главная</a></li>
                    <li><a href="events.php">Мероприятия</a></li>
                    <li><a href="contacts.php">О нас</a></li>
                </ul>
                <div class="vr2"></div>
            </div>
            <div class="action">
                <div class="profile_small" onclick="menuToggle()">
                    <img src="/img/monitoring.png" alt="">
                </div>
                <div class="menu">
                    <h3>
                        <?= $profile_o['nazvanie_org'] ?>
                    </h3>
                    <ul>
                        <li><img src="/img/assets/user.png" alt=""><a href="profile_volun.php">Личный кабинет</a></li>
                        <li><img src="/img/assets/edit.png" alt=""><a href="edit_organ.php">Редактировать профиль</a>
                        </li>
                        <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a></li>
                    </ul>
                </div>
            </div>

            </a>
        </nav>

    </section>

    <section class="profile_o">
        <div class="profile_o_menu">
            <h1>Настройки</h1>
            <div class="profile_o_container">
                <ul>
                    <li><img src="/img/assets/file.png" alt=""><a onclick="printDiv()">Скачать карточку организации</a>
                    </li>
                    <li><img src="/img/assets/suitcase.png" alt=""><a href="organizator_events.php">Мои мероприятия</a>
                    </li>
                    <li><img src="/img/assets/plus.png" alt=""><a href="add_event.php">Добавить мероприятие</a>
                    </li>
                </ul>
                <ul>
                    <li><img src="/img/assets/edit.png" alt=""><a href="edit_organ.php">Редактировать профиль</a></li>
                    <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a></li>
                </ul>
            </div>
        </div>
        <div class="profile_org">
            <h2>Карточка организации</h2>
            <div class="main_i_o" id="profile_org">

                <p>ID
                    <?= $profile_o['id_organiz'] ?>
                </p>
                <p>
                    <?= $profile_o['nazvanie_org'] ?>
                </p>
                <img src="/img/assets/819865.png" alt="" style="width: 30px;">
                <p class="icon_o">
                    <?= $profile_o['adres'] ?>
                </p>
                <p>Описание организации:
                    <?= $profile_o['opisanie'] ?>
                </p>
            </div>


            <h3>Активные заявки</h3>
            <div class="tbl4-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope='col'>№</th>
                            <th scope='col'>Волонтер</th>
                            <th scope='col'>Мероприятие</th>
                            <th scope='col'>Место</th>
                            <th scope='col'>Дата</th>
                            <th scope='col'>Часы</th>
                            <th scope='col'>Ответ на заявку</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl4-content">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <?php
                        $i = 1;
                        do {
                            echo "<tr>";
                            echo "<td>";
                            echo $i++;
                            echo "</td>
					<td>$myrow[fio]</td>
					<td>$myrow[nazvanie]</td>
					<td>$myrow[adres_events]</td>
                    <td>$myrow[data_start] - $myrow[data_finish]</td>
                    <td>$myrow[chas]</td>
                    <td><a href='../core/accept_z.php?id=$myrow[id_zayavka]' class='btn_zayavka'>Принять</a></td>
                    <td><a href='../core/declined_z.php?id=$myrow[id_zayavka]' class='btn_zayavka'>Отклонить</a></td>
				</tr>";

                        }
                        while ($myrow = mysqli_fetch_array($r));
                        echo "</table>";
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
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
        $(window).on("load resize ", function () {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({ 'padding-right': scrollWidth });
        }).resize();

        function printDiv() {
            var divContents = document.getElementById("profile_org").innerHTML;
            var a = window.open('', '', 'height=1000, width=1000');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="scripts.js"></script>
</body>

</html>