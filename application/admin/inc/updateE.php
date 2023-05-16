<?php

		$id_events = $_GET['id_events'];
		$nazvanie = $_GET['nazvanie'];
		$task = $_GET['task'];
		$adres_events = $_GET['adres_events'];
		$data_start = $_GET['data_start'];
		$data_finish = $_GET['data_finish'];
		$fk_organiz = $_GET['fk_organiz'];
		$chas = $_GET['chas'];
			
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