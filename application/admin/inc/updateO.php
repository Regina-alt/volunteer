<?php


	$id_organiz = $_POST['id_organiz'];
	$nazvanie_org = $_POST['nazvanie_org'];
    $adres = $_POST['adres'];
    $opisanie = $_POST['opisanie'];
    $fk_user = $_POST['fk_user'];
    $tel = $_POST['tel'];
	
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