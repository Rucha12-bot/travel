<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='hotel';
$data=json_decode(file_get_contents('php://input'));

$name=$data->name;
$location=$data->location;
$price=$data->price;
$query='insert into '.$table.'(name,location,price) values (:name,:location,:price)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':price',$price);

if($stmt->execute())
{
    $response['message']='hotel done';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}