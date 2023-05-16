<?php
include '../conf/db.php';
session_start();
$id_user = $_SESSION['user']['id_user'];
$select = mysqli_query($connect, "SELECT * FROM `organizator` WHERE `fk_user` = '$id_user'");
$profile_o = mysqli_fetch_assoc($select);

$r = mysqli_query($connect, "SELECT * FROM `events` WHERE `fk_organiz`=$profile_o[id_organiz]");
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
                        <li><img src="/img/assets/edit.png" alt=""><a href="edit_organ.php">Редактировать профиль</a>
                        </li>
                        <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a></li>
                    </ul>
                </div>
            </div>

        </nav>

    </section>

    <section class="profile_v">
        <div class="profile_v_menu" style="height: 97%;">
            <h1>Настройки</h1>
            <div class="profile_v_container">
                <ul>
                    <li><img src="/img/assets/file.png" alt=""><a onclick="printDiv()">Скачать паспорт волонтера</a>
                    </li>
                    <li><img src="/img/assets/suitcase.png" alt=""><a href="volunteer_event.php">Мои мероприятия</a>
                    </li>
                    <li><img src="/img/assets/people.png" alt=""><a href="profile_organ.php">Карточка организатора</a>
                    </li>
                    
                </ul>
                <ul>
                    <li><img src="/img/assets/edit.png" alt=""><a href="edit_organ.php">Редактировать профиль</a>
                    </li>
                    <li><img src="/img/assets/logout.png" alt=""><a href="../core/logout.php">Выйти</a></li>
                </ul>
            </div>
        </div>
        <div class="opt" id="opt">
            <h2>Все заявки</h2>
            <div class="tb4-header">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope='col'>№</th>
                            <th scope='col'>Название</th>
                            <th scope='col'>Задачи</th>
                            <th scope='col'>Адрес проведения</th>
                            <th scope='col'>Дата проведения</th>
                            <th scope='col'>Часы</th>
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
                            echo "</td>";
                            echo "<td>$myrow[nazvanie]</td>";
                            echo "<td>$myrow[task]</td>";
                            echo "<td>$myrow[adres_events]</td>";
                            echo "<td>$myrow[data_start] - $myrow[data_finish]</td>";
                            echo "<td>$myrow[chas]</td>";
                            echo "</tr>";

                        }
                        while ($myrow = mysqli_fetch_array($r));
                        echo "</table>";
                        ?>
                    </tbody>
                </table>
            </div>
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

        function printDiv() {
            var divContents = document.getElementById("opt").innerHTML;
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