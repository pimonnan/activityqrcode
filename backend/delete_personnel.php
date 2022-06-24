<?PHP
    include('connect_db.php');
    $p_id = $_GET['p_id'];
    $sql = "DELETE FROM personnel WHERE p_id = '$p_id'";
    $query = mysqli_query($connection,$sql);
    
    
    // Header('Location:personnel.php');
    echo 'ลบข้อมูลบุคลากรสำเร็จ';

?>