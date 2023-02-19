<?php
	$id_organiz = $_POST['id_organiz'];
	$nazvanie_org = $_POST['nazvanie_org'];
    $adres = $_POST['adres'];
    $opisanie = $_POST['opisanie'];
    $fk_user = $_POST['fk_user'];
    $tel = $_POST['tel'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "INSERT INTO `organizator` (`nazvanie_org`, `adres`, `opisanie`, `fk_user`, `tel`) VALUES ('$nazvanie_org','$adres','$opisanie','$fk_user','$tel')");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-org.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
            header('Location: ../table-org.php');
		}
?>