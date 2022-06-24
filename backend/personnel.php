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
    <title>Position</title>
</head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">

    <?PHP include('nav.php')
    ?>

        <div class="row">
            <div class="col-md-12 mt-3">
                <h1 class="text-center">การจัดการบุคลากร</h1>
                <center><img src="position-removebg-preview.png" alt="position-removebg-preview" width="150" height="150"></center>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter"  class="btn btn-primary my-3">เพิ่มข้อมูล</a>

                <table class="table  table-sm" id="table1">
                <thead>
                <tr>
                <th scope="col">#</th>
                        <th scope="col">รหัสบุคลากร</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">คณะ</th>
                        <th scope="col">สาขาวิชา</th>
                        <th scope="col">วุฒิการศึกษา</th>
                        <th scope="col">รูปบุคลากร</th>
                        <th scope="col">แก้ไข</th>
                        <th scope="col">ลบ</th>
                </tr>
                </thead>
                <tbody>
                    <?PHP
                    include('connect_db.php');
                    $i = 1;
                    $sql = "SELECT * FROM personnel
                    INNER JOIN branch ON b_id = p_branch
                    INNER JOIN department ON d_id = p_department 
                    INNER JOIN faculty ON f_id = b_id 
                    ORDER by p_id DESC";
                    $query = mysqli_query($connection,$sql);
                    while ($row = mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <th scope="row"><?PHP echo $i++;?></th>
                    <td><?PHP echo $row['p_id'];?></td>
                    <td><?PHP echo $row['p_name'];?></td>
                    <td><?PHP echo $row['d_name'];?></td>
                    <td><?PHP echo $row['f_name'];?></td>
                    <td><?PHP echo $row['b_name'];?></td>
                    <td><?PHP echo $row['p_educational'];?></td>
                    <td><a href="form_edit_personnel.php?p_id=<?PHP echo $row['p_id'];?>" class="btn btn-outline-warning">แก้ไข</a></td>
                    <td><button onclick="delete_personnel('<?php echo $row['p_id']; ?>')" class="btn btn-outline-danger">ลบ</button></td>
                </tr>
                <?PHP }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลบุคลากร</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container p-3 mb-2 bg-primary text-back">
      <form action="insert_personnel.php" method="POST">
                    <h2 class="text-center">แบบฟอร์มข้อมูลบุคลากร</h2>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputEmail1">รหัสบุคลากร</label>
                        <input type="text" name="p_id" class="form-control" id="p_id" aria-describedby="emailHelp" placeholder="กรุณากรอกรหัสบุคลกร" required >
                      </div>
                    <div class="form-group">
                  <label for="exampleInputEmail1">รหัสผ่าน</label>
                  <input type="password" name = "p_password" class="form-control" id="p_password" aria-describedby="emailHelp" placeholder="กรุณากรอกรหัสผ่าน" required>
                </div>
                    <label for="exampleInputEmail1">ชื่อ-สกุล บุคลากร</label>
                    <input type="text" name = "p_name" class="form-control" id="p_name" aria-describedby="emailHelp" placeholder="กรุณากรอก ชื่อ - นามสกุลบุคลากร" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">คณะ</label>
                    <select name="p_faculty" id="p_faculty" class="form-control" required>
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
                    <select name="p_branch" id="p_branch" class="form-control" required>
                    <option value="">เลือกสาขาวิชา</option>
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
                          <option value="<?php echo $row2 ['d_id'];?>"><?php echo $row2 ['d_name'];?></option>
                          <?PHP } ?>
                        </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">วุฒิการศึกษา</label>
                  <input type="text" name = "p_educational" class="form-control" id="p_educational" aria-describedby="emailHelp" placeholder="กรุณากรอกวุฒิการศึกษา" required>
                </div>
                   
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Created by</label>
                      <input type="text" name="createdby" class="form-control" id="createdby" placeholder="Enter Created by" required >
                    </div> -->
                <button type="submit" class="btn btn-success">ตกลง</button>
                <button type="reset" class="btn btn-danger">ล้างข้อมูล</button>
        </form>
      </div>
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
                var faculty = $('#p_faculty');
                var branch = $('#p_branch');

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
    
      function delete_personnel(p_id) {
                if(confirm('คุณต้องการลบข้อมูลบุคลากร '+p_id+' ใช่หรือไม่ ?')) {
                    $.get('delete_personnel.php?p_id=' + p_id+'', function(data){
                        alert(data);
                        location.reload();
                    });
                }
                return false; 
            }
    </script>
    <!-- <script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script> -->
</body>
</html>