<?php
		$id_zayavka = $_POST['id_zayavka'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `zayavka` WHERE id_zayavka=$id_zayavka");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-z.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
            header('Location: ../table-z.php');	
		}
?>