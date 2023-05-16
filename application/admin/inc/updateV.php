<?php
$id_volonter = $_GET['id_volonter'];
$fio = $_GET['fio'];
$adres_zitel = $_GET['adres_zitel'];
$date_birthday = $_GET['date_birthday'];
$otrabot_chas = $_GET['otrabot_chas'];
$kol_meropr = $_GET['kol_meropr'];
$fk_user = $_GET['fk_user'];
$img = $_GET['img'];
$tel = $_GET['tel'];

$db = mysqli_connect("localhost", "root", "", "volunteer");
mysqli_query($db, "set names utf8");

$r = mysqli_query($db, "UPDATE `volonter` SET `fio`='$fio',`adres_zitel`='$adres_zitel',`date_birthday`='$date_birthday',`otrabot_chas`='$otrabot_chas',`kol_meropr`='$kol_meropr',`fk_user`='$fk_user',`img`='$img',`tel`='$tel' WHERE `id_volonter`='$id_volonter'");
if ($r == 'true') {
	echo "<meta http-equiv='refresh'>";
	header('Location: ../table-vol.php');
} else {
	echo "<script>alert('Ошибка')</script>";

}
?>