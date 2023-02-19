<?php
		$id_volonter = $_POST['id_volonter'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `volonter` WHERE id_volonter=$id_volonter");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-vol.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
		}
?>