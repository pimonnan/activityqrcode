<?PHP
     include('connect_db.php');
     $id = $_GET['product_id']; 
     $sql = "SELECT * FROM tbl_product WHERE product_id = ".$id."";
     $query = mysqli_query($connection,$sql);
     $row = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
<body>
    <div class="container p-3 mb-2 bg-primary text-back mt-5">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1>แก้ไขข้อมูลสินค้า</h1>
          <img src="<?PHP echo $row['product_picdir'];?><?PHP echo $row['product_pic'];?>"width="200px" alt="<?PHP echo $row['product_pic'];?>"
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 ">
          <form action="edit_product.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-12">
                <input type="hidden" name="product_id" id="ID product" placeholder="Product ID" value="<?PHP echo $row['product_id'];?>"  class="form-control" required> 
              </div>
              <div class="col-lg-6">
                <label for="">Product name</label>
                <input type="text" name="productname" placeholder="Productname" value="<?PHP echo $row['product_name'];?>"  class="form-control" required >
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
                <input type="number" name="amount" placeholder="Amount" value="<?PHP echo $row['product_amount'];?>" class="form-control" required  >
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
                <input type="text" name="price" placeholder="Price" value="<?PHP echo $row['product_price'];?>" class="form-control" required  >
              </div>
              <div class="col-lg-6">
                <label for="">Picture</label>
                <input type="file" name="pic" placeholder="Picture" class="form-control" >
                <input type="hidden" name="picdir" value="<?PHP echo $row['product_picdir'];?>" >
                <input type="hidden" name="pic2" value="<?PHP echo $row['product_pic'];?>" >
              </div>
                
              <div class="col-lg-12 text-center" style="margin-top: 20px;">
                <button class="btn btn-warning" type="edit">Update</button>
                <!-- <button class="btn badge-danger" type="reset">Default</button> -->
                <a href="product.php" class="btn btn-secondary">Return</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>