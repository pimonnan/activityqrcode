<?php
    require('config.php');
	$s_id = $_POST['s_id'];

	
	$result = $conn->query("SELECT * FROM students WHERE s_id='$s_id'");
	
	
	$data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
	echo json_encode($data);
	$conn->close();
	return;
?>