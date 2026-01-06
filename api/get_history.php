<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../includes/db.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM history ORDER BY timestamp DESC";
$stmt = $db->prepare($query);
$stmt->execute();

$num = $stmt->rowCount();
$history_arr = array();

if($num > 0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $history_item = array(
            "id" => $id,
            "amount" => $amount,
            "rate" => $rate,
            "tenure" => $tenure,
            "emi" => $emi,
            "timestamp" => $timestamp
        );
        array_push($history_arr, $history_item);
    }
    http_response_code(200);
    echo json_encode($history_arr);
} else {
    http_response_code(200); // OK, but empty 
    echo json_encode(array()); 
}
?>
