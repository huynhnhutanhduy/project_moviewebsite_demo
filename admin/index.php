<?php
define('ROOT', dirname(__FILE__));//Thư mục chứa file index
include "include/function.php";
include "class/db.class.php";
  if (!isset($_SESSION)) session_start(); //kiểm tra dữ liệu trên server

  if (!isset($_SESSION["thongtindangnhap"])) 
  {
      header("location:login.php"); //chuyển đến file login để đăng nhập
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>AECAYCHUOI - Admin</title>
    <!-- Style css -->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/styles1.css" rel="stylesheet" />
    <!-- Resposive css -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- BOX ICONS -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"
        ><i class="bx bx-movie-play bx-tada main-color"></i> a<span
          class="main-color"
          >e</span
        >cay<span class="main-color">chuoi</span></a
      >
      <button
        class="btn btn-link btn-sm order-1 order-lg-0"
        id="sidebarToggle"
        href="#!"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- FIXME: change Navbar Search-->
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline position-relative my-2 d-inline-block">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Tìm kiếm..."
            aria-label="Tìm kiếm..."
          />
          <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                ><i class="fas fa-user fa-fw"></i
              ></a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="userDropdown"
              >
                <a class="dropdown-item" href="logout.php">Đăng xuất</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar Search -->
    <!-- Start layout right -->
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Quản lý trang web</div>
              <a
                class="nav-link collapsed"
                href="#"
                data-toggle="collapse"
                data-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
              >
                <div class="sb-nav-link-icon">
                  <i class="bx bx-book-reader bx-tada main-color"></i>
                </div>
                Quản lý phim
                <div class="sb-sidenav-collapse-arrow">
                  <i class="fas fa-angle-down"></i>
                </div>
              </a>
              <div
                class="collapse"
                id="collapseLayouts"
                aria-labelledby="headingOne"
                data-parent="#sidenavAccordion"
              >
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="show-items.html">Hiển thị phim</a>
                  <a class="nav-link" href="add-items.html">Thêm phim</a>
                  <a class="nav-link" href="#">Xóa phim</a>
                  <a class="nav-link" href="#">Thêm tin tức</a>
                </nav>
              </div>
                <a
                  class="nav-link collapsed"
                  href="#"
                  data-toggle="collapse"
                  data-target="#collapsePages"
                  aria-expanded="false"
                  aria-controls="collapsePages"
                >
                  <div class="sb-nav-link-icon">
                    <i class="bx bxs-user-account bx-tada main-color"></i>
                  </div>
                    Quản lý người dùng
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fas fa-angle-down"></i>
                    </div>
                </a>
                <div
                  class="collapse"
                  id="collapsePages"
                  aria-labelledby="headingTwo"
                  data-parent="#sidenavAccordion"
                >
                  <nav
                    class="sb-sidenav-menu-nested nav accordion"
                    id="sidenavAccordionPages"
                  >
                    <a class="nav-link" href="show-items.html">Danh sách người dùng</a>
                  </nav>
                </div>
              <div class="sb-sidenav-menu-heading">Khác</div>
              <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon">
                  <!-- <i class="fas fa-chart-area"></i> -->
                  <!-- FIXME: -->
                  <i class="bx bx-line-chart-down bx-tada main-color"></i>
                </div>
                Lượt truy cập
              </a>
              <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon">
                  <!-- <i class="fas fa-table"></i> -->
                  <!-- FIXME: -->
                  <i class="bx bx-table bx-tada main-color"></i>
                </div>
                Thống kê phim
              </a>
            </div>
          </div>
          <!-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
          </div> -->
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4">Bảng thống kê</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Bảng thống kê</li>
            </ol>
            <!-- FIXME: del card -->
            <!-- <div class="row">
              <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                  <div class="card-body">Primary Card</div>
                  <div
                    class="
                      card-footer
                      d-flex
                      align-items-center
                      justify-content-between
                    "
                  >
                    <a class="small text-white stretched-link" href="#"
                      >View Details</a
                    >
                    <div class="small text-white">
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Warning Card</div>
                  <div
                    class="
                      card-footer
                      d-flex
                      align-items-center
                      justify-content-between
                    "
                  >
                    <a class="small text-white stretched-link" href="#"
                      >View Details</a
                    >
                    <div class="small text-white">
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                  <div class="card-body">Success Card</div>
                  <div
                    class="
                      card-footer
                      d-flex
                      align-items-center
                      justify-content-between
                    "
                  >
                    <a class="small text-white stretched-link" href="#"
                      >View Details</a
                    >
                    <div class="small text-white">
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                  <div class="card-body">Danger Card</div>
                  <div
                    class="
                      card-footer
                      d-flex
                      align-items-center
                      justify-content-between
                    "
                  >
                    <a class="small text-white stretched-link" href="#"
                      >View Details</a
                    >
                    <div class="small text-white">
                      <i class="fas fa-angle-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-xl-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-area mr-1"></i>
                    Lượt truy cập
                  </div>
                  <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-xl-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-bar mr-1"></i>
                    Thống kê phim
                  </div>
                  <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIXME: -->
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Các bộ phim hiện đang có trên web
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                      <thead>
                      <tr>
                        <th>Tên phim</th>
                        <th>Thể loại</th>
                        <th>Bình chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>18 Again</td>
                        <td>Tâm lý - Tình cảm</td>
                        <td><i class="fas fa-star"></i> 9</td>
                      </tr>
                      <tr>
                        <td>Avengers: Endgame</td>
                        <td>Hành động - Viễn tưởng</td>
                        <td><i class="fas fa-star"></i> 9.5</td>
                      </tr>
                      <tr>
                        <td>Black Widow</td>
                        <td>Hành động - Viễn tưởng</td>
                        <td><i class="fas fa-star"></i> 9</td>
                      </tr>
                      <tr>
                        <td>Crash Landing On You</td>
                        <td>Tình cảm</td>
                        <td><i class="fas fa-star"></i> 8.5</td>
                      </tr>
                      <tr>
                        <td>Girl from nowhere</td>
                        <td>Kinh dị - Tâm lý</td>
                        <td><i class="fas fa-star"></i> 8</td>
                      </tr>
                      <tr>
                        <td>Godzilla and Kong</td>
                        <td>Hành động</td>
                        <td><i class="fas fa-star"></i> 7</td>
                      </tr>
                      <tr>
                        <td>John Wick</td>
                        <td>Hành động</td>
                        <td><i class="fas fa-star"></i> 9</td>
                      </tr>
                      <tr>
                        <td>Lupin</td>
                        <td>Hành động</td>
                        <td><i class="fas fa-star"></i> 9.2</td>
                      </tr>
                      <tr>
                        <td>Mr Queen</td>
                        <td>Cổ trang</td>
                        <td><i class="fas fa-star"></i> 6.5</td>
                      </tr>
                      <tr>
                        <td>Nobody</td>
                        <td>Hành động</td>
                        <td><i class="fas fa-star"></i> 9.2</td>
                      </tr>
                      <tr>
                        <td>Abyss</td>
                        <td>Tình cảm</td>
                        <td><i class="fas fa-star"></i> 9.2</td>
                      </tr>
                      <tr>
                        <td>Doctor Stranger</td>
                        <td>Tình cảm</td>
                        <td><i class="fas fa-star"></i> 9.2</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">
                <!-- Copyright &copy; Your Website 2021 -->
              </div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/datatables-demo.js"></script>
  </body>
</html>
