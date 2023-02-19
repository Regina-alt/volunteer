<?php
		$id_organiz = $_POST['id_organiz'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `organizator` WHERE id_organiz=$id_organiz");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-org.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
		}
?>