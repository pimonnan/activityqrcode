<?PHP
    //print_r($_POST);
    include('connect_db.php');
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $id = $_POST['product_id'];
    $type = $_POST['type'];
    $unit = $_POST['unit'];

    $picdir = "images/";
    if($_FILES['pic']['name'] != ''){
        
        // มีการอัปโหลดภาพใหม่
        $newname = 'P'.date('Ymd-His');
        $file_exit = substr($_FILES['pic']['name'],strripos($_FILES['pic']['name'],'.'));
        $newname = $newname.$file_exit;

    move_uploaded_file($_FILES['pic']['tmp_name'],$picdir.$newname);
    $sql = "UPDATE tbl_product
            SET product_name = '$productname',
            product_price = '$price',
            product_amount = '$amount',
            product_picdir = '$picdir',
            product_unit_name = '$unit',
            product_type_name = '$type',
            product_pic = '$newname'
            WHERE product_id = '$id'"
            ;

    }else{   
        
        //ไม่มีการอัปโหลดไฟล์
        $picdir = $_POST['picdir'];
        $newname = $_POST['pic2'];
        $sql = "UPDATE tbl_product
        SET product_name = '$productname',
        product_price = '$price',
        product_amount = '$amount',
        product_picdir = '$picdir',
        product_u_name = '$unit',
        product_t_name = '$type',
        product_pic = '$newname'
        WHERE product_id = '$id'";
    }

    $query = mysqli_query($connection,$sql);
    Header('Location:product.php');
         
?>