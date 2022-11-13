<?php
    include 'inc/db.php';
    session_start(); //Начало сессии
    $id_user=$_SESSION['user']['id_user'];

    
    $select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = '$id_user'");
    $profile_v = mysqli_fetch_assoc($select);
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
        </nav>
    </section>

<!------ info ------>

    <section class="info">
        <h1 class="main_in">Платформа добрых дел</h1>
        <p>Вы хотите помочь и не знаете куда обратиться? Присоединяйтесь к нам и у вас будет выбор проверенных нами волонтерских вакансий!</p>
        <a href="#top" class="more-btn">Подробнее</a>
        <div class="main1">
            <img src="img/main3.jpg" alt="">
        </div>
        <div class="main2">
            <img src="img/main2.jpg" alt="">
        </div>
        <div class="main3">
            <img src="img/main1.jpg" alt="">
        </div>
    </section>

<!------ contacts ------>

    <section class="contacts">
            <h1>О нас</h1>
            <hr>
            <a href="contacts.php"><img src="img/button.png" alt="" class="btn"></a>
            <div class="text_cont">
            <p>Калининградский областной центр развития добровольчества или Калининградский добровольческий центр – это государственное бюджетное учреждение, созданное в марте 2019 года как региональный ресурсный центр добровольчества.</p>
            <br>
            <p>Среди основных задач Калининградского добровольческого центра – формирование в регионе инфраструктуры для развития добровольчества, содействие в масштабировании взаимодействия между добровольцами, организациями и органами власти, представление интересов волонтёрского сообщества и продвижение добровольчества как вида деятельности, доступного для любого жителя региона</p>
            </div>


            <div class="brand-carousel section-padding owl-carousel">
                <div class="single-logo"><img alt="" src="img/1.png"></div>
                <div class="single-logo"><img alt="" src="img/2.png"></div>
                <div class="single-logo"><img alt="" src="img/3.png"></div>
                <div class="single-logo"><img alt="" src="img/4.png"></div>
                <div class="single-logo"><img alt="" src="img/5.png"></div>
                <div class="single-logo"><img alt="" src="img/6.png"></div>
                <div class="single-logo"><img alt="" src="img/7.png"></div>
                <div class="single-logo"><img alt="" src="img/8.png"></div>
                <div class="single-logo"><img alt="" src="img/9.png"></div>
            </div>
        </section>
        
<!------ what we can ------>
    
    <section class="can">
        <h1 id="top">Возможности</h1>
            <hr>
            <a href="#"><img src="img/button.png" alt="" class="btn_can"></a>
            
            <div class="grid-container">
                <div class="item2">
                    <img src="img/vol.png" alt="">
                    <h1>Волонтерам</h1>
                    <p>Станьте волонтером, чтобы помогать другим и получать уникальный опыт</p>
                    <a href="reg_volunter.php" class="btn_vol">Стать волонтером</a>
                </div>
                <div class="item3">
                    <img src="img/lupa.png" alt="">
                    <p>Найдите мероприятие или проект в системе</p>
                </div>  
                <div class="item4">
                    <img src="img/doc.png" alt="">
                    <p>Найдите мероприятие или проект в системе</p>
                </div>
                <div class="item5">
                    <img src="img/people.png" alt="">
                    <p>Найдите мероприятие или проект в системе</p>
                </div>
                <div class="item6">
                    <img src="img/comp.png" alt="">
                    <p>Найдите мероприятие или проект в системе</p>
                </div>
            </div>

            <div class="grid-container1">
                <div class="item11">
                    <img src="img/org.png" alt="">
                    <h1>Организаторам</h1>
                    <p class="info_c">Зарегистрируйтесь, как организатор, чтобы получать поддержку на развитие инициатив</p>
                    <a href="reg_organiz.php" class="btn_org">Стать организатором</a>
                </div>
                <div class="item7">
                    <img src="img/calendarwithdate.png" alt="">
                    <p>Создайте мероприятие и вакансии для добровольцев</p>
                </div>  
                <div class="item8">
                    <img src="img/people.png" alt="">
                    <p>Найдите тех, кто поможет в вашем добром деле</p>
                </div>
                <div class="item9">
                    <img src="img/com.png" alt="">
                    <p>Отберите волонтёров</p>
                </div>
            </div>
    </section>
    
    
 <!------ events ------>   
 <section class="events">
            <h1>Мероприятия</h1>
            <hr>
            <a href="events.php"><img src="img/button.png" alt="" class="btn"></a>
            <div class="row">
            <div class="events-col">
                <p class="main_e">Всероссийская акция «Стоматологическое здоровье России»</p>
                <p class="task_e">Задачи волонтера:</p>
                <p class="task">Проведение профилактических тренингов, тренингов на понимание и преодоление зависимости. Организация профилактических бесед, квестов, игр</p>
                <img src="img/819865.png" alt="">
                <p class="adress_e">Респ Башкортостан, г Уфа, ул Ленина</p>
                <img src="img/calendar.png" alt=""  class="calendar">
                <p class="date_e">22 – 26 сентября 2022, 08:00 - 13:00</p>
            </div>
            <div class="events-col">
            <p class="main_e">Всероссийская акция «Стоматологическое здоровье России»</p>
                <p class="task_e">Задачи волонтера:</p>
                <p class="task">Проведение профилактических тренингов, тренингов на понимание и преодоление зависимости. Организация профилактических бесед, квестов, игр</p>
                <img src="img/819865.png" alt="">
                <p class="adress_e">Респ Башкортостан, г Уфа, ул Ленина</p>
                <img src="img/calendar.png" alt=""  class="calendar">
                <p class="date_e">22 – 26 сентября 2022, 08:00 - 13:00</p>
            </div>
            <div class="events-col">
            <p class="main_e">Всероссийская акция «Стоматологическое здоровье России»</p>
                <p class="task_e">Задачи волонтера:</p>
                <p class="task">Проведение профилактических тренингов, тренингов на понимание и преодоление зависимости. Организация профилактических бесед, квестов, игр</p>
                <img src="img/819865.png" alt="">
                <p class="adress_e">Респ Башкортостан, г Уфа, ул Ленина</p>
                <img src="img/calendar.png" alt="" class="calendar">
                <p class="date_e">22 – 26 сентября 2022, 08:00 - 13:00</p> 
            </div>
        </div>
        <a href="events.php" class="btn_e">Посмотреть все</a>
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