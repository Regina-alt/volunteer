<?php
		$id_events = $_GET['id'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `events` WHERE id_events=$id_events");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-events.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
            header('Location: ../table-events.php');	
		}
?>