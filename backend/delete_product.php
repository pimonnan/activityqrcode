<?PHP
     include('connect_db.php');
     $id = $_GET['product_id'];
     echo $sql = 'DELETE FROM tbl_product WHERE product_id = "'.$id.'"';
     $query = mysqli_query($connection,$sql);

     Header('Location:product.php');
?>