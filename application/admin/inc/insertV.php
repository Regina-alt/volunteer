<?php
	$id_volonter = $_POST['id_volonter'];
	$fio = $_POST['fio'];
    $adres_zitel = $_POST['adres_zitel'];
    $date_birthday = $_POST['date_birthday'];
    $otrabot_chas = $_POST['otrabot_chas'];
    $kol_meropr = $_POST['kol_meropr'];
    $fk_user = $_POST['fk_user'];
    $img = $_POST['img'];
	$tel = $_POST['tel'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "INSERT INTO `volonter` (`fio`, `adres_zitel`, `date_birthday`, `otrabot_chas`, `kol_meropr`, `fk_user`, `img`, `tel`) VALUES ('$fio','$adres_zitel','$date_birthday','$otrabot_chas','$kol_meropr','$fk_user','$img','$tel')");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-vol.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
            header('Location: ../table-vol.php');
		}
?>