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

		$r = mysqli_query($db, "INSERT INTO `events` (`nazvanie`, `task`, `adres_events`, `data_start`, `data_finish`, `fk_organiz`, `chas`) VALUES ('$nazvanie','$task','$adres_events','$data_start','$data_finish','$fk_organiz','$chas')");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-events.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
            header('Location: ../table-events.php');
		}
?>