<?php
$db = mysqli_connect("localhost", "root", "", "volunteer");
mysqli_query($db, "set names utf8");

$loads = $_POST['loads'];
$data_finish = $_POST['data_finish'];
$data_start = $_POST['data_start'];

$r = mysqli_query($db, "SELECT * FROM `volonter`,`events`,`zayavka` WHERE `adres_events` like '$loads'  and `zayavka`.`fk_volonter`=`volonter`.`id_volonter` and `zayavka`.`fk_events`=`events`.`id_events` and `status`='accept'  and `data_start` BETWEEN '$data_start' and '$data_finish'");
$myrow = mysqli_fetch_array($r);

$sum = mysqli_query($db, "SELECT SUM(`chas`) as sum FROM `volonter`,`events`,`zayavka` WHERE `adres_events` like '$loads'  and `zayavka`.`fk_volonter`=`volonter`.`id_volonter` and `zayavka`.`fk_events`=`events`.`id_events` and `status`='accept'  and `data_start` BETWEEN '$data_start' and '$data_finish'");
$summa = mysqli_fetch_array($sum);
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
            <div class="otchet2-content">
                <div class="otchet2-text">
                    <h2>Отчет об отработанном времени волонтеров за период в одном городе</h2>
                </div>
                <div class="data-otchet2">
                    <p>
                        Город:
                        <?= $myrow['adres_events'] ?>
                    </p>
                    <div class="period">
                        <div class="period-text">
                            <p>Период:</p>

                        </div>
                        <div class="period-data">
                            <p> c
                                <?= $data_start ?>
                            </p>
                            <p> до
                                <?= $data_finish ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div>
            <div class="otchet2-container">
                <?php
                echo "<table class='otchet-table'>";
                echo "<tr>";
                echo "<th scope='col'>№</th>";
                echo "<th scope='col'>ФИО волонтера</th>";
                echo "<th scope='col'>Город мероприятия</th>";
                echo "<th scope='col'>Мероприятие</th>";
                echo "<th scope='col'>Даты проведения</th>";
                echo "<th scope='col'>Часы</th>";
                echo "</tr>";

                $i = 1;
                do {
                    echo "<tr>";
                    echo "<td>";
                    echo $i++;
                    echo "</td>
                <td>$myrow[fio]</td>
                <td>$myrow[adres_events]</td>
                <td>$myrow[nazvanie]</td>
                <td>$myrow[data_start] - $myrow[data_finish]</td>
                <td>$myrow[chas]</td>
            </tr>";

                }
                while ($myrow = mysqli_fetch_array($r));
                echo "</table>";
                ?>
                <div class="sum">
                <p>Итого:  <?= $summa['sum'] ?>
                    </p>
                </div>
                  
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