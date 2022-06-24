<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>แก้ไขข้อมูลบุคคลากร</title>
</head>
<body>
    <?PHP
        include('connect_db.php');
        $p_id = $_GET['p_id'];
        $sql = "SELECT * FROM personnel
        INNER JOIN branch ON p_branch = b_id
        WHERE p_id = '$p_id'";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($query);
    ?>

    <div class="container  p-3 mb-2 bg-primary text-back mt-5">

    <!-- <?PHP include('nav.php')?> -->

        <div class="row">
            <div class="col-md-12 mt-4">
                <h1 class="text-center">แก้ไข แบบฟอร์มข้อมูลบุคลากร</h1>
                <form action="edit_personnel.php" method="POST">
                <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสบุคลากร</label>
                  <input type="text" name = "p_id" class="form-control" id="p_id" aria-describedby="emailHelp" value = "<?PHP echo $row['p_id']?>" placeholder="กรุณากรอกรหัสนักศึกษา" readonly="true" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสผ่าน</label>
                  <input type="password" name = "p_password" class="form-control" id="p_password" aria-describedby="emailHelp" value = "<?PHP echo $row['p_password']?>" placeholder="กรุณากรอกรหัสผ่าน" required>
                  <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                    <label for="exampleInputEmail1">ชื่อ-สกุล นักศึกษา</label>
                    <input type="text" name = "p_name" class="form-control" id="p_name" aria-describedby="emailHelp" value = "<?PHP echo $row['p_name']?>" placeholder="กรุณากรอก ชื่อ - นามสกุล" required>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">คณะ</label>
                    <select name="p_faculty" id="p_faculty" class="form-control" required>
                        <option value="">เลือกคณะ</option>
                        <?PHP 
                          $sql2 = "SELECT * FROM faculty 
                          INNER JOIN branch ON f_id = b_faculty
                           ORDER by 'f_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                          <option value="<?php echo $row2 ['f_id'];?>" <?php if ($row2 ['f_id'] == $row ['b_faculty']){ echo 'selected'; }?>><?php echo $row2 ['f_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">สาขาวิชา</label>
                    <select name="p_branch" id="p_branch" class="form-control" required>
                      <option value="<?php echo $row ['p_branch'];?>"><?php echo $row ['b_name'];?></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ตำแหน่ง</label>
                    <select name="p_department" id="p_department" class="form-control" required>
                        <option value="">เลือกตำแหน่ง</option>
                        <?PHP
                          $sql2 = "SELECT * FROM department ORDER by 'd_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                           <option value="<?php echo $row2 ['d_id'];?>" <?php if ($row2 ['d_id'] == $row ['p_department']){ echo 'selected'; }?>><?php echo $row2 ['d_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">วุฒิการศึกษา</label>
                  <input type="text" name = "p_educational" class="form-control" id="p_educational" aria-describedby="emailHelp" value = "<?PHP echo $row['p_educational']?>" placeholder="กรุณากรอกวุฒิการศึกษา" required>
                </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Created by</label>
                      <input type="text" name="createdby" class="form-control" id="createdby" value="<?PHP echo $row['position_createdby'];?>" placeholder="Enter Createdby" required>
                    </div> -->
                    <div class="col-lg-12 text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-warning">อัพเดท</button>
                    <a href="personnel.php" class="btn btn-secondary">ย้อนกลับ</a>
                  </form>
            </div>

        </div>
    </div>
    <script>
            function myFunction() {
              var x = document.getElementById("p_password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
      </script>
</body>
</html>