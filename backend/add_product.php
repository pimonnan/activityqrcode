<?PHP
    include('connect_db.php');
    $productname =  $_POST['productname'];
    $price = $_POST['price'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $unit = $_POST['unit'];

    $picdir = "images/";
    if($_FILES['pic']['name']){
        $newname = 'P'.date('Ymd-His');
        $file_exit = substr($_FILES['pic']['name'],strripos($_FILES['pic']['name'],'.'));
        $newname = $newname.$file_exit;
        move_uploaded_file($_FILES['pic']['tmp_name'],$picdir.$newname);
        $sql = 'INSERT INTO tbl_product (product_name,product_price,product_amount,product_picdir,product_pic,product_u_name,product_t_name)
        VALUES ("'.$productname.'", "'.$price.'", "'.$amount.'", "'.$picdir.'", "'.$newname.'", "'.$unit.'", "'.$type.'");';
        $query = mysqli_query($connection,$sql);

        echo "Upload Successful";

    }

    Header('Location:product.php');
    
?>