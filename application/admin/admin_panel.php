<?php
    include '../conf/db.php';
    session_start(); //Начало сессии
    $id_user=$_SESSION['user']['id_user'];

    
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
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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
          <img src="/img/assets/logo.png" class="logo-icon" alt="logo icon">
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
              <i class="bi bi-file-earmark-break"></i>
            </div>
            <div class="menu-title">Отчеты</div>
          </a>
          <ul>
            <li> <a href="otchet.php">
                <i class="bi bi-circle"></i>Книжка волонтера
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
                        <h6 class="mb-0 dropdown-user-name"><?= $profile['login'] ?></h6>
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


    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Главная</div>
          
        </div>
        <!--end breadcrumb-->


        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-5">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="mx-auto widget-icon bg-light-dark text-dark">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="text-center mt-3">
                  <h3 class="text-dark mb-1">10</h3>
                  <p class="text-muted mb-4">Отклики</p>
                  <p class="text-dark mb-0 font-13"><i class="bi bi-arrow-up"></i><span>45.5%</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="mx-auto widget-icon bg-light-dark text-dark">
                  <i class="bi bi-wallet-fill"></i>
                </div>
                <div class="text-center mt-3">
                  <h3 class="text-dark mb-1">14</h3>
                  <p class="text-muted mb-4">Пользователей</p>
                  <p class="text-dark mb-0 font-13"><i class="bi bi-arrow-up"></i><span>24.5%</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="mx-auto widget-icon bg-light-dark text-dark">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="text-center mt-3">
                  <h3 class="text-dark mb-1">7</h3>
                  <p class="text-muted mb-4">Волонтеров</p>
                  <p class="text-dark mb-0 font-13"><i class="bi bi-arrow-down"></i><span>15.8%</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="mx-auto widget-icon bg-light-dark text-dark">
                  <i class="bi bi-chat-text-fill"></i>
                </div>
                <div class="text-center mt-3">
                  <h3 class="text-dark mb-1">4</h3>
                  <p class="text-muted mb-4">Организатора</p>
                  <p class="text-dark mb-0 font-13"><i class="bi bi-arrow-up"></i><span>35.2%</span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="mx-auto widget-icon bg-light-dark text-dark">
                  <i class="bi bi-bar-chart-fill"></i>
                </div>
                <div class="text-center mt-3">
                  <h3 class="text-dark mb-1">42.8%</h3>
                  <p class="text-muted mb-4">Популярность платформы</p>
                  <p class="text-dark mb-0 font-13"><i class="bi bi-arrow-down"></i><span>28.5%</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->



        
        <!--end row-->


        
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->



    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

    <!--start switcher-->
    <div class="switcher-body">
      <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
        tabindex="-1" id="offcanvasScrolling">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <h6 class="mb-0">Theme Variation</h6>
          <hr>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
            <label class="form-check-label" for="LightTheme">Light</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option1" checked>
            <label class="form-check-label" for="SemiDark">Semi Dark</label>
          </div>
          <hr />
          <h6 class="mb-0">Header Colors</h6>
          <hr />
          <div class="header-colors-indigators">
            <div class="row row-cols-auto g-3">
              <div class="col">
                <div class="indigator headercolor1" id="headercolor1"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor2" id="headercolor2"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor3" id="headercolor3"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor4" id="headercolor4"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor5" id="headercolor5"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor6" id="headercolor6"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor7" id="headercolor7"></div>
              </div>
              <div class="col">
                <div class="indigator headercolor8" id="headercolor8"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end switcher-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

  </div>
  <!--end wrapper-->


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