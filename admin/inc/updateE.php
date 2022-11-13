<?php

		$id_events = $_POST['id_events'];
		$nazvanie = $_POST['nazvanie'];
		$task = $_POST['task'];
		$adres_events = $_POST['adres_events'];
		$data_start = $_POST['data_start'];
		$data_finish = $_POST['data_finish'];
		$fk_organiz = $_POST['fk_organiz'];
		$chas = $_POST['chas'];
			
		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "UPDATE `events` SET `nazvanie`='$nazvanie',`task`='$task',`adres_events`='$adres_events',`data_start`='$data_start',`data_finish`='$data_finish',`fk_organiz`='$fk_organiz',`chas`='$chas' WHERE `id_events`='$id_events'");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";	
            header('Location: ../table-events.php');		
		} else {
			echo "<script>alert('Ошибка')</script>";
            header('Location: ../table-events.php');
           
		}
?>