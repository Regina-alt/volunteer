<?php
     include 'inc/db.php';
     session_start(); //Начало сессии
     $id_user=$_SESSION['user']['id_user'];
     $select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = ' $id_user'");
     $profile_v = mysqli_fetch_assoc($select);

     $sql = "SELECT * FROM `events`";
     $result = mysqli_query($connect, $sql);
     $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <?php if (!empty($_SESSION['user'])):?>
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
            <?php endif;?>

            <?php if (empty($_SESSION['user'])):?>
            <a href="authorisation.php" class="auth-btn">Вход</a>
            <div class="reg-block">
                <a href="reg_volunter.php" class="reg-btn">Регистрация</a>
            </div>
            <?php endif;?>
        </a>
        </nav>

    </section >

    <section class="event_more">
        <h1>Мероприятия</h1>
        <div class="hr"></div>
        <!-- <div class="kalendar"> 
            <a href="#" class="kalendar_btn"><img src="img/back.png" alt="" width="30px" height="30px"></a>
            <p class="">Сентябрь 2022</p>
            <a href="#" class="kalendar_btn1"><img src="img/next.png" alt="" width="30px" height="30px"></a>
        </div> -->
        
                
        
<div class="container">
    <?php foreach($events as $event): ?>
                <div class="row">
                    <div class="col-md-3">
                        <h4><?= $event['nazvanie'] ?></h4>
                        <p class="task_org">Задачи волонтера:</p>
                        <p class="task_bd"><?= $event['task'] ?></p>
                        <hr>
                        <p class="adres_ev"><img src="img/819865.png" alt=""><?= $event['adres_events'] ?></p>
                        <p class="adres_ev"><img src="img/calendar.png" alt=""><?= $event['data_start'] ?> - <?= $event['data_finish'] ?></p>
                        <a href="inc/zayavka.php?id=<?= $event['id_events'] ?>" class="btn_zayavka">Подать заявку</a>
                    </div>
                </div>
    <?php endforeach; ?>
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