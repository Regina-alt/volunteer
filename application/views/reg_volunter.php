<?php
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

    <section class="reg">
        <form action="../core/sign_v.php" method="POST" enctype="multipart/form-data" class="form_reg_v">
            <h5>Регистрация</h5>
            <p>Электронная почта<span>*</span></p>
            <input type="email" name="login" required>
            <p>Пароль<span>*</span></p>
            <div class="password">
                <input type="password" name="password_g" id="password_g" required>
                <a href="#" class="password-control1" onclick="return show_hide_password1(this)"></a>
            </div>
            <p>Повторите пароль<span>*</span></p>
            <div class="password">
                <input type="password" name="password_ag" id="password_ag" required>
                <a href="#" class="password-control" onclick="return show_hide_password(this)"></a>
            </div>
            <button type="submit">Регистрация</button>
            <p class="link_reg">
                У вас есть аккаунт? - <a href="authorisation.php">Вход</a>
            </p>
            <?php
            if ($_SESSION['message']) {
                echo ' <p class="message"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
    </section>

    <script>
        function show_hide_password(target) {
            var input = document.getElementById('password_ag');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }

        function show_hide_password1(target) {
            var input = document.getElementById('password_g');
            if (input.getAttribute('type') == 'password') {
                target.classList.add('view');
                input.setAttribute('type', 'text');
            } else {
                target.classList.remove('view');
                input.setAttribute('type', 'password');
            }
            return false;
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="scripts.js"></script>
</body>

</html>