<?php
		$id_volonter = $_GET['id'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `volonter` WHERE id_volonter=$id_volonter");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-vol.php');	
		} else {
			echo "<script>alert('Запись является внешним ключом в другой таблице')</script><meta http-equiv='refresh'>";
		}
?>