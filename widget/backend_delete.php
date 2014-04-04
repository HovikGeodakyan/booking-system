<?php
require_once '_db.php';
$id=$_POST['id'];
$stmt = $db->prepare("DELETE FROM events WHERE (id=".$id.")");
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);

?>
