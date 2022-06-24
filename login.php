<?php
    require('config.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
    $result = $conn->query("SELECT * FROM personnel 
	INNER JOIN department ON p_department = d_id
	WHERE p_id='$username' && p_password='$password'");
	
	$result2 = $conn->query("SELECT * FROM students 
	INNER JOIN branch ON s_branch = b_id
	INNER JOIN faculty ON f_id = b_id
	WHERE s_id='$username' && s_password='$password'");
    $data = array();
    while($row = $result->fetch_assoc()) {
        $data = $row;
    }
	
	 $data2 = array();
    while($row2 = $result2->fetch_assoc()) {
        $data2 = $row2;
    }
	
	$count =  mysqli_num_rows($result);

    $count2 =  mysqli_num_rows($result2);
	
	if($count == 0 && $count2 == 0){
		http_response_code(404);
		$conn->close();
		return;
	}else if ($count2 == 0){
		echo json_encode($data);
		$conn->close();
		return;
	}else if ($count == 0){
		echo json_encode($data2);
		$conn->close();
		return;
	}
    
?>