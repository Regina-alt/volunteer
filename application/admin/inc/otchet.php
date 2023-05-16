<?php
$db = mysqli_connect("localhost", "root", "", "volunteer");
mysqli_query($db, "set names utf8");

$fio = $_POST['fio'];

$r = mysqli_query($db, "SELECT * FROM `zayavka`, `events`, `volonter`, `organizator` WHERE `zayavka`.`fk_volonter`=`volonter`.`id_volonter` and `zayavka`.`fk_events`=`events`.`id_events` and `events`.`fk_organiz` = `organizator`.`id_organiz` and `fio`= '$fio' and `zayavka`.`status`='accept'");
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

    <div class="printform" >
        <div class="otchet">
            <div class="otchet-content">
                <p>
                    <?= $myrow['fio'] ?>
                </p>
                <p class="otc_p">
                    <?= $myrow['date_birthday'] ?>
                </p>
                <p class="otc_p">
                    <?= $myrow['tel'] ?>
                </p>
                <p class="otc_p">
                    <?= $myrow['adres_zitel'] ?>
                </p>


                <div class="otcher-footer">

                    <img src="<?="/img/uploads/" . $myrow['img'] ?>" alt="" width="50px" height="50px" class="img_p">
                    <p>
                        <?= $myrow['id_volonter'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="otchet-container">
                <h1>Сведения о добровольческой (волонтерской) деятельности</h1>
                <?php

                echo "<table class='otchet-table'>";
                echo "<tr>";
                echo "<th scope='col'>№</th>";
                echo "<th scope='col'>Дата</th>";
                echo "<th scope='col'>Мероприятие</th>";
                echo "<th scope='col'>Организация</th>";
                echo "<th scope='col'>Часы</th>";
                echo "</tr>";

                $i = 1;
                do {
                    echo "<tr>";
                    echo "<td>";
                    echo $i++;
                    echo "</td>
                <td>$myrow[data_start] - $myrow[data_finish]</td>
                <td>$myrow[nazvanie]</td>
                <td>$myrow[nazvanie_org]</td>
                <td>$myrow[chas]</td>
            </tr>";

                }
                while ($myrow = mysqli_fetch_array($r));
                echo "</table>";
                ?>
            </div>
        </div>
    </div>

</body>

</html>