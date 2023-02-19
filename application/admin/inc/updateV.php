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

		$r = mysqli_query($db, "UPDATE `volonter` SET `fio`='$fio',`adres_zitel`='$adres_zitel',`date_birthday`='$date_birthday',`otrabot_chas`='$otrabot_chas',`kol_meropr`='$kol_meropr',`fk_user`='$fk_user',`img`='$img',`tel`='$tel' WHERE `id_volonter`='$id_volonter'");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";	
            header('Location: ../table-vol.php');		
		} else {
			echo "<script>alert('Ошибка')</script>";
           
		}
?>