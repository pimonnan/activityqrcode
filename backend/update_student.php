<?php
    include('connect_db.php');

    // print_r($_POST);
    // exit;
    $s_id = $_POST['s_id'];
    $s_password = $_POST['s_password'];
    $s_name = $_POST['s_name'];
    $s_card = $_POST['s_card'];
    $s_genaration = $_POST['s_genaration'];
    $s_group = $_POST['s_group'];
    $s_branch = $_POST['s_branch'];

    $sql = "UPDATE students SET s_password = '$s_password', 
                s_name = '$s_name', 
                s_card = '$s_card', 
                s_genaration = '$s_genaration',
                s_group = '$s_group',
                s_branch = $s_branch
                WHERE s_id = '$s_id'";
           
    
    // บันทึก
    $query = mysqli_query($connection, $sql);

    // ลิ้งค์กลับ
    Header("location:student.php");

?>