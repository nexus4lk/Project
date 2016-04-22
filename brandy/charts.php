<?php
require "dbroom.php";

//new object
$Charts = new Charts();

// if(isset($_POST['get_charts'])){
	$get_chart = $Charts->getChart();
	if($get_chart != "empty"){
		foreach($get_chart as $chart){
			$json[] = array(
				'RName'=>$chart['Room_Name'],
				'CChart'=>$chart['Count_chart'],
			);
	}
		//return JSON object
		echo json_encode($json);
	}
	// else {
	// 	echo "empty";
	// }
// }

 ?>
