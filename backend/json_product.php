<?PHP
    include('connect_db.php');

    $sql = "SELECT * FROM tbl_product order by product_id ASC";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)){
        $array[] = $row = array(
            'id' => $row['product_id'],
            'name' => $row['product_name'],
            'price' => $row['product_price'],
            'amount' => $row['product_amount'],
            'images' => 'http://localhost/dru/backend'.$row['product_picdir'].$row['product_pic'],
        );
    }
    $json = json_encode($array);
    echo $json;
?>