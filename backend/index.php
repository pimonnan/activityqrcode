<?php
  session_start();

 
  
  if(!empty($_SESSION['Mlogin'])){
    // header('Location:login.php?error=Please login');
    echo '';
    // header('Location: login.php');
    //ก้อบไปลงหน้าที่จะไม่ให้เข้าเพราะหน้าโปดัทยังเข้าได้
  }else{
    // header('Location: login.php');
    header('Location:login.php?error=Please login');
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">
    
      <?PHP include('nav.php')?>
        <div class="row" align="center"> 
            <div class="col-md-12 mt-4">
                <h1 class="text-center">ผู้ดูแลระบบ</h1>
            </div>
            <div class="col-md-4 mt-4 ">
              <div class="card" style="width: 18rem;">
              <div class="card-header text-dark">
              การจัดการนักศึกษา
              </div>    
                <div class="card-body">
                <center><img src="users-removebg-preview.png" alt="users" width="200" height="200"></center>
                <div class="container">
                  <div class="row">
                    <div class="col text-center">
                      <a href="student.php" class="btn btn-primary btn-lg mt-3">จัดการ</a>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 mt-4">
              <div class="card" style="width: 18rem;">
              <div class="card-header text-dark">
              การจัดการบุคลากร
              </div>  
                <div class="card-body">
                <center><img src="position-removebg-preview.png" alt="position" width="200" height="200"></center>
                <div class="container">
                  <div class="row">
                    <div class="col text-center">
                    <a href="position.php" class="btn btn-primary btn-lg mt-3 ">จัดการ</a>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 mt-4">
              <div class="card" style="width: 18rem;">
              <div class="card-header text-dark">
              การจัดการงานกิจกรรม
              </div> 
                <div class="card-body">
                <center><img src="good_truck-removebg-preview.png" alt="product" width="200" height="200"></center>
                <div class="container">
                  <div class="row">
                    <div class="col text-center">
                    <a href="product.php" class="btn btn-primary btn-lg center mt-3">จัดการ</a>
                    </div>
                  </div>
                </div>
                  
                </div>
              </div>
            </div>

        </div>
    </div>
</body>
</html>