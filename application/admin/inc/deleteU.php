<?php
		$id_user = $_GET['id'];

		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");
		$r = mysqli_query($db, "DELETE FROM `user` WHERE id_user=$id_user");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";		
            header('Location: ../table-user.php');	
		} else {
			echo "<script>alert('Ошибка')</script><meta http-equiv='refresh'>";
			header('Location: ../table-user.php');	
		}
?>