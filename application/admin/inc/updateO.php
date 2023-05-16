<?php


	$id_organiz = $_GET['id_organiz'];
	$nazvanie_org = $_GET['nazvanie_org'];
    $adres = $_GET['adres'];
    $opisanie = $_GET['opisanie'];
    $fk_user = $_GET['fk_user'];
    $tel = $_GET['tel'];
	
		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "UPDATE `organizator` SET `nazvanie_org`='$nazvanie_org',`adres`='$adres',`opisanie`='$opisanie',`fk_user`='$fk_user',`tel`='$tel' WHERE `id_organiz`='$id_organiz'");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";	
            header('Location: ../table-org.php');		
		} else {
			echo "<script>alert('Ошибка')</script>";
           
		}
?>