<?php
     include 'inc/db.php';
     session_start(); //Начало сессии
     $id_user=$_SESSION['user']['id_user'];
     $select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
     $profile_v = mysqli_fetch_assoc($select);


     $r = mysqli_query($connect, "SELECT * FROM `zayavka`, `events`, `volonter`, `organizator` WHERE `zayavka`.`fk_volonter`=`volonter`.`id_volonter` and `zayavka`.`fk_events`=`events`.`id_events` and `events`.`fk_organiz` = `organizator`.`id_organiz` and `id_volonter`=$profile_v[id_volonter] and `zayavka`.`status`='accept'");
	$myrow = mysqli_fetch_array($r);

    $count = mysqli_query($connect, "SELECT count(*) FROM `zayavka` WHERE `fk_volonter`= $profile_v[id_volonter] and `zayavka`.`status`='accept'");
    $crow = mysqli_fetch_array($count);

    $countm = $crow['count(*)'];

    $sum = mysqli_query($connect, "SELECT sum(chas) FROM `zayavka`, `events` WHERE `fk_volonter`= $profile_v[id_volonter] and `zayavka`.`status`='accept' and `zayavka`.`fk_events`=`events`.`id_events`");
    $srow = mysqli_fetch_array($sum);

    $chasi = $srow['sum(chas)'];

    $up = mysqli_query($connect, "UPDATE `volonter` SET `otrabot_chas`='$chasi',`kol_meropr`='$countm' WHERE `id_volonter`=$profile_v[id_volonter]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet">
    <title>Volunteer</title>
</head>
<body>
<section class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png"></a>
            <p>Volunteer</p>
            <div class="nav-links" id="navLinks">
                <div class="vr1"></div>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="events.php">Мероприятия</a></li>
                    <li><a href="contacts.php">О нас</a></li>
                </ul>
                <div class="vr2"></div>
            </div>
            <div class="action" >
                <div class="profile_small" onclick="menuToggle()">
                    <img src="<?= "uploads/" .$profile_v['img']?>" alt="">
                </div>
            <div class="menu">
                <h3><?= $profile_v['fio'] ?></h3>
                <ul>
                    <li><img src="img/user.png" alt=""><a href="profile_volun.php">Личный кабинет</a></li>
                    <li><img src="img/edit.png" alt=""><a href="edit_volun.php">Редактировать профиль</a></li>
                    <li><img src="img/logout.png" alt=""><a href="inc/logout.php">Выйти</a></li>
                </ul>
            </div>
            </div>
        
        </nav>

    </section >

    <section class="profile_v">
    <h2>Личная книжка волонтера</h2>
    <img class="img_p" src="<?= "uploads/" .$profile_v['img']?>" alt="">
    <p>ID <?= $profile_v['id_volonter'] ?></p>
    <p><?= $profile_v['fio'] ?></p>
    <p>Отработано часов    <?= $srow['sum(chas)'] ?></p>
    <p>Мероприятий  <?= $crow['count(*)'] ?></p>
    <img src="img/819865.png" alt="" style="width: 30px;" class="icons">
    <p><?= $profile_v['adres_zitel'] ?></p>
    <img src="img/calendar.png" alt="" style="width: 30px;" class="icons">
    <p><?= $profile_v['date_birthday'] ?></p>
    <img src="img/telephone.png" alt="" style="width: 30px;" class="icons">
    <p><?= $profile_v['tel'] ?></p>
    <h3>Опыт волонтерской деятельности</h3>
    <div class="opt">
    <?php
        $i = 1;

        echo "<table class='table_v' id='table_v'>";
        echo "<tr>";
        echo  "<th scope='col'>№</th>";
        echo  "<th scope='col'>Организатор</th>";
        echo   "<th scope='col'>Мероприятие</th>";
        echo   "<th scope='col'>Место проведения</th>";
        echo   "<th scope='col'>Вакансия</th>";
        echo   "<th scope='col'>Дата</th>";
        echo   "<th scope='col'>Часы</th>";
        echo "</tr>";
			

			do{
				echo "<tr>";
				echo	"<td>";
                echo  $i++;
                echo "</td>";
				echo	"<td>$myrow[nazvanie_org]</td>";
				echo	"<td>$myrow[nazvanie]</td>";
				echo	"<td>$myrow[adres_events]</td>";
                echo   "<td>Волонтер</td>";
                echo    "<td>$myrow[data_start] - $myrow[data_finish]</td>";
                echo    "<td>$myrow[chas]</td>";
				echo "</tr>";
                
			}
            while ($myrow = mysqli_fetch_array($r));
            echo "</table>";
         
            mysqli_query($connect, "UPDATE `volonter` SET `otrabot_chas`='$profile_v[otrabot_chas] + $myrow[chas]',`kol_meropr`=count($myrow[id_zayavka]) WHERE `id_volonter`='$id_volonter'")   ;
    ?>
    </div>
    </section>



   <!------ footer ------>       
   <section class="footer">
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
        <div class="links_b">
            <a href="#">Пользовательские соглашения</a>
            <a href="#">Правила пользования</a>
            <a href="#">Политика конфиденциальности</a>
        </div>
    </section>

    <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
    ?>
    
<script>
    function menuToggle(){
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