<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	//$text = $json->result->parameters->text;
    $text = $json->queryResult->parameters->roomNumber;
    
	$speech = "Booking room ". $text;

	$response = new \stdClass();
	$response->fulfillmentText`= $speech;
	/*$response->displayText = $speech;*/
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
