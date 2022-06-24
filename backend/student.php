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
    <link rel="stylesheet" href="css/datatable.bootstrap4.css">
    <title>หน้าการจัดการนักศึกษา</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">
        <?php include('nav.php')?>  
        <div class="row">
            <div class="col-md-12 mt-4 my-3">
                <h2 class="text-center">จัดการนักศึกษา</h2> 
                <center><img src="users-removebg-preview.png" alt="users-removebg-preview" width="150" height="150"></center>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary my-3">เพิ่มข้อมูล</a>
                <table class="table table-hover mt-3" id = "table1">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">รหัสนักศึกษา</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">เลขบัตรประชาชน</th>
                        <th scope="col">รุ่น</th>
                        <th scope="col">กลุ่ม</th>
                        <th scope="col">สาขาวิชา</th>
                        <th scope="col">คณะ</th>
                        <th scope="col">รูปนักศึกษา</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?PHP
                        $i = 1;
                        include('connect_db.php');
                        $sql = "SELECT * FROM students
                        INNER JOIN branch ON b_id = s_branch
                        INNER JOIN faculty ON f_id = b_faculty 
                        ORDER by s_id DESC";
                        $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                        // $url = $row['user_photo'];
                        // $image = base64_encode(file_get_contents($url));

                    ?>
                        <tr>
                            <th scope="row"><?PHP echo $i++; ?></th>
                            <td><?PHP echo $row['s_id'];?></td>
                            <td><?PHP echo $row['s_name'];?></td>
                            <td><?PHP echo $row['s_card'];?></td>
                            <td><?PHP echo $row['s_genaration'];?></td>
                            <td><?PHP echo $row['s_group'];?></td>
                            <td><?PHP echo $row['f_name'];?></td>
                            <td><?PHP echo $row['b_name'];?></td>
                            <td><img src = "<?PHP echo $row['s_img'] ?>" alt = "" width = "60"></td>
                            <td><a href="edit_student.php?s_id=<?PHP echo $row['s_id'];?>" class="btn btn-outline-warning">แก้ไข</a></td>
                            <td><a href="#" onclick = "delete_student(<?PHP echo $row['s_id'];?>)" class="btn btn-outline-danger">ลบ</a></td>
                        </tr>
                        <?PHP } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลนักศึกษา</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body container p-3 mb-2 bg-primary text-back">
            <h2 class="text-center">แบบฟอร์มการกรอกข้อมูลนักศึกษา</h2>
            <form action = "insert_student.php"  method = "POST">
                <div class="form-group">
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสนักศึกษา</label>
                  <input type="text" name = "s_id" class="form-control" id="s_id" aria-describedby="emailHelp" placeholder="กรุณากรอกรหัสนักศึกษา" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">รหัสผ่าน</label>
                  <input type="password" name = "s_password" class="form-control" id="s_password" aria-describedby="emailHelp" placeholder="กรุณากรอกรหัสผ่าน" required>
                </div>
                    <label for="exampleInputEmail1">ชื่อ-สกุล นักศึกษา</label>
                    <input type="text" name = "s_name" class="form-control" id="s_name" aria-describedby="emailHelp" placeholder="กรุณากรอก ชื่อ - นามสกุล" required>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">เลขบัตรประจำตัวประชาชน</label>
                  <input type="text" name = "s_card" class="form-control" id="s_card" aria-describedby="emailHelp" placeholder="กรุณากรอกเลขบัตรประจำตัวประชาชน" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">รุ่น</label>
                  <input type="text" name = "s_genaration" class="form-control" id="s_genaration" aria-describedby="emailHelp" placeholder="กรุณากรอกรุ่น" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">กลุ่ม</label>
                  <input type="text" name = "s_group" class="form-control" id="s_group" aria-describedby="emailHelp" placeholder="กรุณากรอกกลุ่ม" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">คณะ</label>
                    <select name="s_faculty" id="s_faculty" class="form-control" required>
                        <option value="">เลือกคณะ</option>
                        <?PHP
                          $sql2 = "SELECT * FROM faculty ORDER by 'f_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                          <option value="<?php echo $row2 ['f_id'];?>"><?php echo $row2 ['f_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">สาขาวิชา</label>
                    <select name="s_branch" id="s_branch" class="form-control" required>
                    <option value="">เลือกสาขาวิชา</option>
                        </select>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Photo Link</label>
                    <input type="text" name = "photo" class="form-control" id="image" aria-describedby="emailHelp" placeholder="Enter Photo" required>
                </div> -->
                <button type="submit" class="btn btn-success">ตกลง</button>
                <button type="reset" class="btn btn-danger">ล้างข้อมูล</button>
            </form>
        </div>
    </div>
    </div>
    
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/datatable.js"></script>
        <script src="js/datatable.bootstrap4.js"></script>
        
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
        </script>

        <script>
            $(document).ready(function() {
                
                $('#table1').DataTable();
            
                $('#insert_data').submit(function(e) {
                    e.preventDefault();

                    var name = $('#fullname').val();
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var position = $('#position').val();
                    var photo = $('#image').val();

                    $.ajax({
                        url : "insert_data.php",
                        type : "POST",
                        data : {name : name, username : username, password : password, position : position, photo : photo},
                        success : function(data) {
                            alert(data);
                            location.reload();
                        }
                    });
                
                });
            });

            function delete_student(s_id) {
                if(confirm('คุณต้องการลบข้อมูลนักศึกษา '+s_id+' ใช่หรือไม่ ?')) {
                    $.get('delete_student.php?s_id=' + s_id, function(data){
                        alert(data);
                        location.reload();
                    });
                }
            }
        </script>
</body>
</html>