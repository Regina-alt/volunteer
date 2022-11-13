<?php
    include 'inc/db.php';
    session_start(); //Начало сессии
    $id_user=$_SESSION['user']['id_user'];
    $select = mysqli_query($connect, "SELECT * FROM `volonter` WHERE `fk_user` = ' $id_user'");
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

<section class="main_contacts">
    <div class="tab">
        <ul>
            <li><button class="tablinks" onclick="openContacts(event, 'info')">Информация о проекте</button></li>
            <li><button class="tablinks" onclick="openContacts(event, 'contacts1')">Контакты</button></li>
            <li><button class="tablinks" onclick="openContacts(event, 'reg')">Региональные партнеры</button></li>
        </ul>
    </div>


    <div id="info" class="tabcontent" >
        <h1 class="zagolovok" >О проекте</h1>
        <p>VOLONTER.RU —  это проект Ассоциации НКО «Союз волонтерских организаций и движений».</p>
        <p>Проект создан нами в 2013 году, чтобы облегчить людям поиск возможностей стать волонтерами.</p>
        <p>Волонтеры/добровольцы — это люди, которые бескорыстно делают добро. Одни волонтеры помогают нуждающимся: дружат с детьми в детских домах, ухаживают за пожилыми и инвалидами, играют с тяжелобольными детьми в больницах, поддерживают отказных детей, кормят бездомных.</p>
        <p>Другие волонтеры ищут пропавших детей и взрослых, помогают тушить пожары, едут спасать пострадавших из-за стихийных бедствий и катастроф.</p>
        <p>Есть волонтеры, помогающие природе и животным: они организуют субботники, уборки мусора, облагораживают территорию, ухаживают за бездомными животными.</p>
        <p>Есть Волонтеры Москвы «серебряного» возраста: круг неравнодушных людей старше 50 лет, активных и оптимистичных по жизни.</p>
        <p>В общем, деятельность волонтеров/добровольцев весьма разнообразна. Но часто бывает так, что человек хочет кому-то помогать, но не знает, как это сделать, куда обратиться. В интернете много информации о благотворительных организациях, которым нужны волонтеры. Но кому помочь в первую очередь? И действительно ли эти организации занимаются тем, о чем заявляют? Есть от чего растеряться!</p>
        <p>Проект VOLONTER.RU призван помочь Вам решить проблему выбора, и найти ту волонтерскую деятельность, которое подойдет именно Вам.</p>
        <p>Мы хотим, чтобы волонтеров в России стало как можно больше! Приглашаем Вас к участию в добрых делах!</p>
    </div>


    <div id="contacts1" class="tabcontent">
        <h1 class="zagolovok">Контакты</h1>
        <img src="/img/819865.png" alt="">
        <p class="c_in">Юридический адрес: г. Калининград, ул. Мореходная, 9</p>
        <img src="/img/telephone.png" alt="">
        <p class="c_in">Телефон: +7(911)1273-23-33</p>
        <img src="/img/email.png">
        <p class="c_in">E-mail: <a href="#">info@volunteer.ru</a></p>
        <hr>
        <p class="c_info">Часы работы:</p>
        <p class="c_i">Понедельник — Пятница: с 09:00 до 19:00</p>
        <p class="c_i">Суббота — Воскресенье: выходной</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2305.4125900387908!2d20.505472416015593!3d54.702363879976694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e3161646f34907%3A0xbb37edd553e837f4!2z0JrQsNC70LjQvdC40L3Qs9GA0LDQtNGB0LrQuNC5INC80L7RgNGB0LrQvtC5INGA0YvQsdC-0L_RgNC-0LzRi9GI0LvQtdC90L3Ri9C5INC60L7Qu9C70LXQtNC2!5e0!3m2!1sru!2sru!4v1665415306823!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="reg" class="tabcontent">
        <h1 class="zagolovok">Региональные партнеры</h1>
        <p>Региональные партнеры проекта VOLONTER.RU содействуют его развитию в регионах присутствия и валидируют НКО регионов для участия в проекте.</p>
        <p>Региональными партнерами проекта являются:</p>
        <ul>
            <li>БФ «Созвездие сердец», Новосибирская область</li>
            <li>БЦ «Верю в чудо», Калининградская область</li>
            <li>АНО «Старт в будущее», Калужская область</li>
            <li>ГБФ «Фонд Тольятти», Самарская область</li>
            <li>БФ «Альпари», Республика Татарстан</li>
            <li>БФ «Анастасия», Краснодарский край</li>
            <li>БФ «Старость в радость», Московская область</li>
        </ul>
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
function openContacts(evt, NameC) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(NameC).style.display = "block";
    evt.currentTarget.className += " active";
}


    function menuToggle(){
        const toggleMenu = document.querySelector('.menu');
        toggleMenu.classList.toggle('active');
    }

</script>
</body>
</html>