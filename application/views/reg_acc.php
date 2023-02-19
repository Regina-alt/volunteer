<?php
//Начало сессии
session_start();
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
            <div class="logo">
                <a href="/index.php"><img src="/img/assets/logo.png"></a>
                <p class="aut_o">Volunteer</p>
            </div>
            <div class="reg-block">
                <a href="reg_organiz.php" class="reg-btn">Стать организатором</a>
            </div>
        </nav>
    </section>

    <section class="reg_volun">
        <form action="../core/check.php" method="POST" enctype="multipart/form-data" class="form_r">
            <h5>Заполнение профиля</h5>
            <p>ФИО<span>*</span></p>
            <input type="text" name="fio">
            <p>Дата рождения<span>*</span></p>
            <input type="date" name="date_birthday">
            <p>Телефон<span>*</span></p>
            <img src="/img/assets/telephone.png" alt="" class="tel">
            <input type="tel" name="tel">
            <p>Адрес жительства<span>*</span></p>
            <input type="text" name="adres_zitel">
            <p>Изображение профиля</p>
            <input type="file" name="img_profile">
            <button type="submit">Подтвердить</button>
        </form>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="scripts.js"></script>
</body>

</html>