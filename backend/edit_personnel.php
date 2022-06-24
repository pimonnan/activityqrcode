<?PHP
    session_start();
    include('connect_db.php');

    $p_id = $_POST['p_id'];
    $p_password = $_POST['p_password'];
    $p_name = $_POST['p_name'];
    $p_department = $_POST['p_department'];
    $p_branch = $_POST['p_branch'];
    $p_educational = $_POST['p_educational'];

    $sql = "UPDATE personnel SET 
    p_password = '$p_password',
    p_name = '$p_name',
    p_department = $p_department,
    p_branch = $p_branch,
    p_educational = '$p_educational'
    WHERE p_id = '$p_id'";

    $query = mysqli_query($connection,$sql);

    Header('Location:personnel.php');
?>