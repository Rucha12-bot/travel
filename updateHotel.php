<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='hotel';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$location=$data->location;
$id=$data->id;
$query='update '.$table.' set name=:name,location=:location where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Hotel details updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>