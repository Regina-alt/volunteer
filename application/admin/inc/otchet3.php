<?php
$db = mysqli_connect("localhost", "root", "", "volunteer");
mysqli_query($db, "set names utf8");

$id_organiz = $_POST['id_organiz'];

$r = mysqli_query($db, "SELECT * FROM `organizator`,`events` WHERE `organizator`.`id_organiz`=`events`.`fk_organiz` and `id_organiz`='$id_organiz'");
$myrow = mysqli_fetch_array($r);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        rel="stylesheet">
    <title>Volunteer</title>
</head>

<body onload="window.print()">

    <div class="printform">
        <div class="otchet3">
            <div class="header-otchet3">
                <div class="logo-otchet3">
                    <img src="/img/assets/logo.png" alt="" style="width: 50px">
                    <p>Volunteer</p>
                </div>
                <div class="datatime" id="datatime"></div>
            </div>
            <div class="otchet3-content">
                <h1>Карточка организации</h1>
                <p>
                    Название организации:
                    <?= $myrow['nazvanie_org'] ?>
                </p>
                <p class="otc_p">
                    Адрес организации:
                    <?= $myrow['adres'] ?>
                </p>
                <p class="otc_p">
                    Описание:
                    <?= $myrow['opisanie'] ?>
                </p>
                <p class="otc_p">
                    Номер телефона:
                    <?= $myrow['tel'] ?>
                </p>
            </div>
        </div>
        <div>
            <div class="otchet3-container">
                <h1>Активные мероприятия</h1>
                <?php

                echo "<table class='otchet-table'>";
                echo "<tr>";
                echo "<th scope='col'>№</th>";
                echo "<th scope='col'>Название мероприятия</th>";
                echo "<th scope='col'>Место проведения</th>";
                echo "<th scope='col'>Задачи</th>";
                echo "<th scope='col'>Даты проведения</th>";
                echo "<th scope='col'>Часы</th>";
                echo "</tr>";

                $i = 1;
                do {
                    echo "<tr>";
                    echo "<td>";
                    echo $i++;
                    echo "</td>
                <td>$myrow[nazvanie]</td>
                <td>$myrow[adres_events]</td>
                <td>$myrow[task]</td>
                <td>$myrow[data_start] - $myrow[data_finish]</td>
                <td>$myrow[chas]</td>
            </tr>";

                }
                while ($myrow = mysqli_fetch_array($r));
                echo "</table>";
                ?>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function zero_first_format(value) {
            if (value < 10) {
                value = '0' + value;
            }
            return value;
        }

        /* функция получения текущей даты и времени */
        function date_time() {
            var current_datetime = new Date();
            var day = zero_first_format(current_datetime.getDate());
            var month = zero_first_format(current_datetime.getMonth() + 1);
            var year = current_datetime.getFullYear();

            return day + "." + month + "." + year;
        }

        /* выводим текущую дату и время на сайт в блок с id "current_date_time_block" */
        document.getElementById('datatime').innerHTML = date_time();
    </script>
</body>

</html>