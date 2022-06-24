<?PHP
    session_start();

    include('connect_db.php');

    //print_r($_POST);
    $p_id = $_POST['p_id'];
    $p_password = $_POST['p_password'];
    $p_name = $_POST['p_name'];
    $p_department = $_POST['p_department'];
    $p_branch = $_POST['p_branch'];
    $p_educational = $_POST['p_educational'];
    

    $sql = "INSERT INTO personnel (p_id,p_password, p_name, p_department, p_branch, p_educational )
    VALUES ('$p_id', '$p_password', '$p_name', '$p_department', '$p_branch', '$p_educational')";
 
   $query = mysqli_query($connection,$sql);

    // echo 'Insert data successful';
     Header('Location:personnel.php');
    
?>