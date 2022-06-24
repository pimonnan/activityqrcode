<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>หน้าเข้าสู่ระบบ</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">
    
      
      <form action="check_login.php" method="POST">
        <div class="row">
            <div class="col-md-12 mt-3">
                
                <h1 class="text-center">เข้าสู่ระบบ</h1>
                <center><img src="images-removebg-preview.png" alt="images-removebg-preview" width="120" height="120"></center>
                <?php
                    
                    if (isset($_GET['error'])) 
                    {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Something wrong !</strong> '.$_GET['error'].'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                    }
                ?>
                
            </div>
           <div class="col-md-12">
                <div class="form-group">
                <label for="">ผู้ใช้</label>
                <input type="text" name="username" id="" class="form-control" placeholder="Enter username" aria-describedby="helpId" require>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                <label for="">รหัสผ่าน</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter password" aria-describedby="helpId" require>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <div class="form-group ">
                    <button class="btn btn-success btn-block btn-sm">Submit</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/datatable.js"></script>
    <script src="js/datatable.bootstrap4.js"></script>
</body>
</html>