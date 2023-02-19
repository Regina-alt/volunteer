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
        <nav style="justify-content: start;">
            <a href="/index.php"><img src="/img/assets/logo.png"></a>
            <p class="aut_vol">Volunteer</p>
        </nav>
</section>

<section class="aut">
    <form action="../core/avtoriz.php" method="post" class="form_avtoriz">
    <h5>Вход</h5>
    <p>Электронная почта<span>*</span></p>
    <input type="email" name="login">
    <p>Пароль<span>*</span></p>
    <div class="password">
        <input type="password" name="password_v" id="password_v">
        <a href="#" class="password-control2" onclick="return show_hide_password2(this)"></a>
    </div>
    <button type="submit">Войти</button>
    <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
    ?>
    <p class="link_reg">
            У вас нет аккаунта? - <a href="reg_volunter.php">Зарегистрироваться</a>
    </p>
    </form>
</section>
<script>
        function show_hide_password2(target){
	var input = document.getElementById('password_v');
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
