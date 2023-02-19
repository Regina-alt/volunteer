<?php

	$id_user = $_POST['id_user'];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	
		$db=mysqli_connect("localhost", "root", "", "volunteer");
		mysqli_query($db, "set names utf8");

		$r = mysqli_query($db, "UPDATE `user` SET `login`='$login',`password`='$password',`role`='$role' WHERE `id_user`='$id_user'");
		if ($r == 'true') {
			echo "<meta http-equiv='refresh'>";	
            header('Location: ../table-user.php');		
		} else {
			echo "<script>alert('Ошибка')</script>";
            header('Location: ../table-user.php');		
		}
?>