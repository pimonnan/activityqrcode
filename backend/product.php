<?PHP
  include('connect_db.php');
  $sql2 = "SELECT * FROM tbl_product order by product_id DESC limit 1";
  $query2 = mysqli_query($connection,$sql2);
  $row2 = mysqli_fetch_array($query2);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
<body>
    <div class="container p-3 mb-2 bg-info text-back mt-5">

    <?PHP include('nav.php')?>

      <div class="row">
        <div class="col-lg-12 text-center my-2">
          <h1>หน้าจัดการสินค้า</h1>
          <center><img src="good_truck-removebg-preview.png" alt="product-removebg-preview" width="150" height="150"></center>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 ">
          <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-6">
                <label for="">Product name</label>
                <input type="text" name="productname" placeholder="Product name"  class="form-control" required >
              </div>
              <div class="col-lg-6">
                <label for="">Product type</label>
                <select name="type" id="type" class="form-control" required>
                        <?PHP
                          $sql2 = "SELECT * FROM type_product ORDER by 'type_product_id' DESC";
                          $query2 = mysqli_query($connection,$sql2);
                          while ($row2 = mysqli_fetch_array($query2)){?>
                          <option value="<?php echo $row2 ['type_product_id'];?>"><?php echo $row2 ['type_product_name'];?></option>
                        <?PHP } 
                        ?>
                </select>
              </div>
              <div class="col-lg-6">
                <label for="">Amount</label>
                <input type="text" name="amount" placeholder="Amount" class="form-control" required>
              </div>
              <div class="col-lg-6">
                <label for="">Product unit</label>
                <select name="unit" id="unit" class="form-control" required>
                        <?PHP
                          $sql3 = "SELECT * FROM product_unit ORDER by 'unit_id ' DESC";
                          $query3 = mysqli_query($connection,$sql3);
                          while ($row3 = mysqli_fetch_array($query3)){?>
                          <option value="<?php echo $row3 ['unit_name'];?>"><?php echo $row3 ['unit_name'];?></option>
                        <?PHP } 
                        ?>
                </select>
              </div>
              <div class="col-lg-6">
                <label for="">Price</label>
                <input type="text" name="price" placeholder="Price" class="form-control" required>
              </div>
              <div class="col-lg-6">
                <label for="">Picture</label>
                <input type="file" name="pic" class="form-control" required  >
              </div>
              <div class="col-lg-12 text-center" style="margin-top: 20px;">
                <button class="btn btn-success btn-block" type="submit">Submit</button>
                <!-- <button class="btn badge-danger" type="reset">Clear</button> -->
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 text-center">
          <h2>ตารางสินค้า</h2>
          <table class="table table-sm">
            <tr>
              <th>#</th>
              <th>Photo</th>
              <th>Product name</th>
              <th>Product Amount</th>
              <th>Product Unit</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            <?PHP
              include('connect_db.php');
              $sql = "SELECT * FROM tbl_product order by product_id DESC";
              $query = mysqli_query($connection,$sql);
              $i = 1;
              while($row = mysqli_fetch_array($query)){
                echo'<tr>
                <td>'.$i.'</td>
                <td><img src="'.$row['product_picdir'].''.$row['product_pic'].'"width="100px"></td>
                <td>'.$row['product_name'].'</td>
                <td>'.$row['product_amount'].'</td>
                <td>'.$row['product_u_name'].'</td>
                <td><a href="form_edit_product.php?product_id='.$row['product_id'].'" class="btn btn-outline-warning">แก้ไข</a></td>
                <td><a href="delete_product.php?product_id='.$row['product_id'].'" class="btn btn-outline-danger">ลบ</a></td>
              </tr>';
              $i++;
              }
            ?>
          </table>
        </div>
      </div>
    </div>
</body>
<!-- <script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    } -->
</script>
</html>