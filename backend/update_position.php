<?php
    session_start();

    include('connect_db.php');

    // print_r($_POST);
    // exit;
    $name = $_POST['name'];
    $statusid = $_POST['statusid'];
    $updatedby = $_SESSION['Mlogin'];
    $date = date('Y-m-d h:i:s');

     $sql = "UPDATE tbl_position SET position_name = '$name', 
                position_statusid = '$statusid', 
                position_updatedby = '$updatedby', 
                position_updatedate = '$updatedate'
                WHERE position_id = '$id'";
           
    // บันทึก
    $query = mysqli_query($connection, $sql);

    // ลิ้งค์กลับ
    Header("location:position.php");

?>