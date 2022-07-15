<?php
  include "include/function.php";
  include "class/db.class.php";
  session_start();
      if(isset($_SESSION["thongtindangnhap"]['username'])) 
      {
        header("location:index.php");
        exit;
      }
  $db = new db();
  $u = postIndex("user");
  $p = postIndex("pass");

  if ($u !=="" && $p !="")
  {
    $sql="select * from admin where username= :U 
      and password = :P ";
    $arr = array(":U"=> $u, ":P"=> $p);
    $rows = $db->selectQuery($sql, $arr);
    if ($db->n >0) //Co user
    {
      
      $_SESSION["thongtindangnhap"]= $rows[0];
      header("location:index.php");
      exit;
    }	
    else {
      ?>
        <script type="text/javascript" language="javascript">
          alert ("Tên đăng nhập hoặc mật khẩu sai !!!");
          window.history.go(-1);
        </script>
      <?php
      }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Đăng nhập trang quản trị</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-primary">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">
                      Đăng nhập
                    </h3>
                  </div>
                  <div class="card-body">
                
                    <form action="" method="post">
                        <div class="form-group">
                          <label class="small mb-1" for="inputEmailAddress"
                            >Tên tài khoản</label
                          >
                          <input
                            class="form-control py-4"
                            placeholder="Nhập tên tài khoản"
                            name="user"
                          />
                        </div>
                        <div class="form-group">
                          <label class="small mb-1" for="inputPassword"
                            >Mật khẩu</label
                          >
                          <input
                            class="form-control py-4"
                            id="inputPassword"
                            type="password"
                            placeholder="Nhập mật khẩu"
                            name="pass"
                          />
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                            <input
                              class="custom-control-input"
                              id="rememberPasswordCheck"
                              type="checkbox"
                            />
                            <label
                              class="custom-control-label"
                              for="rememberPasswordCheck"
                              >Nhớ mật khẩu</label
                            >
                          </div>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                          <a class="small" href="../index.html">Trở về trang chủ</a>
                          <input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập" />
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
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
  </body>
</html>
