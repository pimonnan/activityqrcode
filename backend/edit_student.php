<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/datatable.bootstrap4.css">
    <title>หน้าการจัดการนักศึกษา</title>
</head>
<body>
    <?PHP 
        include('connect_db.php');
        $s_id = $_GET['s_id'];
        $sql = "SELECT * FROM students
        INNER JOIN branch ON s_branch = b_id
        WHERE s_id = '$s_id'";
        $query = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($query);
    ?>
      <div class="container p-3 mb-2 bg-primary text-back mt-5">
        <!-- <?php include('nav.php')?> -->
        <div class="row">
          <div class="col-md-12 mt-4">
            <h2 class="text-center">แก้ไขแบบฟอร์มข้อมูลนักศึกษา</h2>
            <form action = "update_student.php" method = "POST">
            <div class="form-group">
              <div class="form-group">
                  <!-- <label for="exampleInputEmail1">รหัสนักศึกษา</label> -->
                  <input type="hidden" name = "s_id" class="form-control" id="s_id" aria-describedby="emailHelp" value = "<?PHP echo $row['s_id']?>" placeholder="กรุณากรอกรหัสนักศึกษา" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสผ่าน</label>
                  <input type="password" name = "s_password" class="form-control" id="s_password" aria-describedby="emailHelp" value = "<?PHP echo $row['s_password']?>" placeholder="กรุณากรอกรหัสผ่าน" required>
                  <input type="checkbox" onclick="myFunction()">Show Password
                </div>
                    <label for="exampleInputEmail1">ชื่อ-สกุล นักศึกษา</label>
                    <input type="text" name = "s_name" class="form-control" id="s_name" aria-describedby="emailHelp" value = "<?PHP echo $row['s_name']?>" placeholder="กรุณากรอก ชื่อ - นามสกุล" required>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">เลขบัตรประจำตัวประชาชน</label>
                  <input type="text" name = "s_card" class="form-control" id="s_card" aria-describedby="emailHelp" value = "<?PHP echo $row['s_card']?>" placeholder="กรุณากรอกเลขบัตรประจำตัวประชาชน" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">รุ่น</label>
                  <input type="text" name = "s_genaration" class="form-control" id="s_genaration" aria-describedby="emailHelp" value = "<?PHP echo $row['s_genaration']?>" placeholder="กรุณากรอกรุ่น" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">กลุ่ม</label>
                  <input type="text" name = "s_group" class="form-control" id="s_group" aria-describedby="emailHelp" value = "<?PHP echo $row['s_group']?>" placeholder="กรุณากรอกกลุ่ม" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">คณะ</label>
                    <select name="s_faculty" id="s_faculty" class="form-control" required>
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
                    <select name="s_branch" id="s_branch" class="form-control" required>
                      <option value="<?php echo $row ['s_branch'];?>"><?php echo $row ['b_name'];?></option>
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Photo Link</label>
                    <input type="text" name = "photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?PHP echo $row['user_photo']?>" placeholder="Enter Photo" required>
                </div> -->
                <div class="col-lg-12 text-center" style="margin-top: 20px;">
                <button type="submit" class="btn btn-warning ">อัพเดท</button>
                <a href="student.php" class="btn btn-danger">ย้อนกลับ</a>
              </form>
          </div>
        </div>
      </div>

      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.bundle.js"></script>
      <script src="js/bootstrap.min.js"></script>
      
      <script>
            $(function() {
                var faculty = $('#s_faculty');
                var branch = $('#s_branch');

                faculty.on('change', function() {
                    var f_id = $(this).val();

                    branch.html('<option value="">เลือกสาขาวิชา</option>');

                    $.get('get_branch.php?f_id=' + f_id, function(data){
                        var result = JSON.parse(data);
                        $.each(result, function(index, item) {
                            branch.append(
                                $('<option></option>').val(item.b_id).html(item.b_name)
                            )
                        });
                    });
                });
            });
            function myFunction() {
              var x = document.getElementById("s_password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
      </script>
</body>
</html>

