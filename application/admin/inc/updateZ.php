<?php

		$id_zayavka = $_POST['id_zayavka'];
		$fk_volonter = $_POST['fk_volonter'];
		$fk_events = $_POST['fk_events'];
		$status = $_POST['status'];
			
		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "UPDATE `zayavka` SET `fk_volonter`='$fk_volonter',`fk_events`='$fk_events',`status`='$status' WHERE `id_zayavka`='$id_zayavka'");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";	
            header('Location: ../table-z.php');		
		} else {
			echo "<script>alert('Ошибка')</script>";
            header('Location: ../table-z.php');
           
		}
?>