<?php 
require_once('config/init.php'); 

	$query = "SELECT vinylid, vinyl, produces, suitable_for, available_in FROM print_options_table ORDER BY vinylid ASC";

$jsondata = mysqli_query($mysqli_conn,$query);

$vRows = array();
while ($row_vDetails = mysqli_fetch_assoc($jsondata)) {
  array_push($vRows, $row_vDetails);
}

echo json_encode($vRows);
?>