<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

include_once '../includes/db.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)) {
    $query = "DELETE FROM history WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":id", $data->id);

    if($stmt->execute()){
         http_response_code(200);
         echo json_encode(array("message" => "Record deleted."));
    } else {
         http_response_code(503);
         echo json_encode(array("message" => "Unable to delete record."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "ID is missing."));
}
?>
