<?php
    session_start();

    include('connect_db.php');
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM personnel WHERE p_id = '$username' and p_password = '$password' ";

    $query = mysqli_query($connection,$sql);

    if($query->num_rows > 0){
        $row = mysqli_fetch_array($query);
        $_SESSION['Mlogin'] = $row['p_id'];
        $_SESSION['auth-name'] = $row['p_name'];
        // echo 'success';
        header('Location: index.php');
    }else{
        // echo 'faild';
        header('Location: login.php?error=username or password invalid');
    }
?>