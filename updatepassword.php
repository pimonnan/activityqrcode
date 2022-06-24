<?php
	require('config.php');
	$s_id = $_POST['s_id'];
	$s_password = $_POST['s_password'];
	$b_password = $_POST['b_password'];
	
	$result = $conn->query("SELECT * FROM students WHERE s_id = '$s_id' && s_password = '$b_password'");
	$data = "";
    while($row = $result->fetch_assoc()) {
       $data = $row["s_password"];
    }
	
	if($b_password = $data){
		echo "success";
		$update = $conn->query("UPDATE students SET s_password='$s_password' WHERE s_id='$s_id'");
	}else{
		http_response_code(404);
	}
	
    /* if($update) {
        echo "Success";
    } */
	$conn->close();
	return;

?>