<?PHP
// url mrthon = GET, Form methon = POST
    include('connect_db.php');
    $s_id = $_GET['s_id'];
    $sql = "DELETE FROM students WHERE s_id = '$s_id'";
    $query = mysqli_query($connection, $sql);

    echo "ลบข้อมูลนักศึกษาสำเร็จ"
?>