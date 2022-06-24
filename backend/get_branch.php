<?php
include('connect_db.php');
$sql = "SELECT * FROM branch WHERE b_faculty={$_GET['f_id']}";
$query = mysqli_query($connection, $sql);
 
$json = array();
while($result = mysqli_fetch_assoc($query)) {    
    array_push($json, $result);
}
echo json_encode($json);
?>