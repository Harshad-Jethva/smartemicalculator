<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once '../includes/db.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->amount) &&
    !empty($data->rate) &&
    !empty($data->tenure) &&
    !empty($data->emi)
){
    $query = "INSERT INTO history (amount, rate, tenure, emi) VALUES (:amount, :rate, :tenure, :emi)";
    $stmt = $db->prepare($query);

    $stmt->bindParam(":amount", $data->amount);
    $stmt->bindParam(":rate", $data->rate);
    $stmt->bindParam(":tenure", $data->tenure);
    $stmt->bindParam(":emi", $data->emi);

    if($stmt->execute()){
        http_response_code(201);
        echo json_encode(array("message" => "Calculation saved successfully."));
    } else {
        http_response_code(503);
        echo json_encode(array("message" => "Unable to save calculation."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Incomplete data."));
}
?>
