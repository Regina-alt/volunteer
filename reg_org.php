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
            <p class="aut_oo">Volunteer</p>
        </nav>
</section>

<section class="reg">
<form action="inc/check_org.php" method="POST" enctype="multipart/form-data" class="form_r">
    <h5>Заполнение профиля</h5>
    <p>Название<span>*</span></p>
    <input type="text" name="nazvanie_org">
    <p>Адрес организации<span>*</span></p>
    <input type="text" name="adres" >
    <p>Телефон<span>*</span></p>
    <img src="img/telephone.png" alt="" class="tel">
    <input type="tel" name="tel">
    <p>Описание</p>
    <input type="text" name="opisanie">
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
