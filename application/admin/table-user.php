<?php
include '../conf/db.php';
session_start(); //Начало сессии
$id_user = $_SESSION['user']['id_user'];


$select = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user` = '$id_user'");
$profile = mysqli_fetch_assoc($select);
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet">

  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Volunteer</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div>
          <a href="admin_panel.php"><img src="/img/assets/logo.png" class="logo-icon" alt="logo icon"></a>
        </div>
        <div>
          <h4 class="logo-text">Volunteer</h4>
        </div>
        <div class="toggle-icon ms-auto">
          <ion-icon name="menu-sharp"></ion-icon>
        </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
              <i class="bi bi-file-earmark-break"></i>
            </div>
            <div class="menu-title">Таблицы</div>
          </a>
          <ul>
            <li> <a href="table-vol.php">
                <i class="bi bi-circle"></i>Волонтеры
              </a>
            </li>
            <li> <a href="table-org.php">
                <i class="bi bi-circle"></i>Организаторы
              </a>
            </li>
            <li> <a href="table-user.php">
                <i class="bi bi-circle"></i>Пользователи
              </a>
            </li>
            <li> <a href="table-events.php">
                <i class="bi bi-circle"></i>Мероприятия
              </a>
            </li>
            <li> <a href="table-z.php">
                <i class="bi bi-circle"></i>Заявки
              </a>
            </li>
          </ul>
        </li>
        <li class="menu-label">Статистика и отчеты</li>
        <li>
          <a class="has-arrow" href="javascript:;">
            <div class="parent-icon">
              <i class="bi bi-graph-up"></i>
            </div>
            <div class="menu-title">Отчеты</div>
          </a>
          <ul>
            <li> <a href="otchet.php">
                <i class="bi bi-circle"></i>Книжка волонтера
              </a>
            </li>
            <li> <a href="otchet2.php">
                <i class="bi bi-circle"></i>Отработанное время волонтёров за период в одном городе
              </a>
            </li>
            <li> <a href="otchet3.php">
                <i class="bi bi-circle"></i>Карточка организации
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <!--end navigation-->
    </aside>
    <!--end sidebar -->

    <!--start top header-->
    <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="top-navbar-right ms-auto">

          <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="user-setting">
                  <img src="/img/man.png" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:;">
                    <div class="d-flex flex-row align-items-center gap-2">
                      <img src="/img/man.png" alt="" class="rounded-circle" width="54" height="54">
                      <div class="">
                        <h6 class="mb-0 dropdown-user-name">
                          <?= $profile['login'] ?>
                        </h6>
                        <small class="mb-0 dropdown-user-designation text-secondary">Администратор</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="../core/logout.php">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <ion-icon name="log-out-outline"></ion-icon>
                      </div>
                      <div class="ms-3"><span>Выйти</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

          </ul>

        </div>
      </nav>
    </header>
    <!--end top header-->

    <div class="table-user">
    <h3>Таблица "Пользователи"</h3>
      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Добавить запись
      </button>

      <!-- Модальное окно -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Добавление волонтера</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
              <form action='inc/insertU.php' method='POST'>
                <label for="login">Логин</label>
                <br />
                <input size='35' class='form-control1' , name='login' type='text'>
                <br />
                <label for="password">Пароль</label>
                <br />
                <input size='35' class='form-control1' , name='password' type='text'>
                <br />
                <label for="role">Роль</label>
                <br />
                <input size='35' class='form-control1' , name='role' type='text'>
                <br />
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
              <input type='submit' class='btn btn-warning' value='Добавить'>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php

      if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
      } else {
        $pageno = 1;
      }
      $size_page = 5;
      $offset = ($pageno - 1) * $size_page;

      $count_sql = "SELECT COUNT(*) FROM `user`";
      $result = mysqli_query($connect, $count_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $size_page);
      $sql = "SELECT `id_user`, `login`, `password`, `role` FROM `user` LIMIT $offset, $size_page";
      $res_data = mysqli_query($connect, $sql);
      echo "<table class='table'>";
      echo "<tr>";
      echo "<th scope='col'>#</th>";
      echo "<th scope='col'>Логин</th>";
      echo "<th scope='col'>Пароль</th>";
      echo "<th scope='col'>Роль</th>";
      echo "<th scope='col'>Модификация</th>";
      echo "<th scope='col'>Удаление</th>";
      echo "</tr>";
      while ($myrow = mysqli_fetch_array($res_data)) {
        echo "<tr>
				<form action = 'inc/updateU.php' method = 'GET'>
					<td><input size='32' class='form-control1', name = 'id_user' type='text' value='$myrow[id_user]' readonly></td>
					<td><input size='32' class='form-control1', name = 'login' type='text' value='$myrow[login]' ></td>
					<td><input size='34' class='form-control1', name = 'password' type='text' value='$myrow[password]'></td>
          <td><input size='30' class='form-control1', name = 'role' type='text' value='$myrow[role]'></td>
					<td><input type='submit' class='btn btn-warning' value='Изменить'></td>
				</form>
				<td>
        <a name='submit' class='btn btn-danger' href='inc/deleteU.php?id=$myrow[id_user]'>Удалить</a>
				</td>
				</tr>";
      }
      echo "</table>";

      ?>
      <ul class="pagin">
        <li><a href="?pageno=1">В начало</a></li>
        <li class="<?php if ($pageno <= 1) {
          echo 'disabled';
        } ?>">
          <a href="<?php if ($pageno <= 1) {
            echo '#';
          } else {
            echo "?pageno=" . ($pageno - 1);
          } ?>">Предыдущая</a>
        </li>
        <li class="<?php if ($pageno >= $total_pages) {
          echo 'disabled';
        } ?>">
          <a href="<?php if ($pageno >= $total_pages) {
            echo '#';
          } else {
            echo "?pageno=" . ($pageno + 1);
          } ?>">Следующая</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">В конец</a></li>
      </ul>
      <?php
      mysqli_close($connect);
      ?>
    </div>



    <!-- JS Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


</body>

</html>