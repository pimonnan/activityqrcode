<?php
 
 require('config.php');
  $result = $conn->query("SELECT activity.a_id, a_name, a_qty,a_datestart,a_timestart,a_dateend,a_timeend,a_status,a_decription,p_name,activity.f_id,f_name
	FROM activity INNER JOIN personnel
	ON activity.p_id = personnel.p_id
	INNER JOIN faculty
	ON activity.f_id = faculty.f_id");
	
	$data = array();
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
	echo json_encode($data);
	$conn->close();
	return;
	
?>