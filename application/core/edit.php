<?php
$id_volonter = $_POST['id_volonter'];
$fio = $_POST['fio'];
$adres_zitel = $_POST['adres_zitel'];
$date_birthday = $_POST['date_birthday'];
$img = $_POST['img'];
$tel = $_POST['tel'];


if(!empty($_FILES['img_profile'])){
    $name = $_FILES['img_profile']['name'];
    $tmp_name = $_FILES['img_profile']['tmp_name'];
    move_uploaded_file($tmp_name, "../uploads/" . $name);
}

    $db=mysqli_connect("localhost", "root", "", "volunteer");
    mysqli_query($db, "set names utf8");

    $r = mysqli_query($db, "UPDATE `volonter` SET `fio`='$fio',`adres_zitel`='$adres_zitel',`date_birthday`='$date_birthday',`img`='$name',`tel`='$tel' WHERE `id_volonter`='$id_volonter'");
    if ($r == 'true') {
        echo "<meta http-equiv='refresh'>";	
        header('Location: ../views/edit_volun.php');		
    } else {
        echo "<script>alert('Ошибка')</script>";
       
    }


?>