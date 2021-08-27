<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='booking';
$data=json_decode(file_get_contents('php://input'));

$name=$data->name;
$type=$data->type;
$data=$data->data;
$refer=$data->refer;
$query='insert into '.$table.'(name,type,data,refer) values (:name,:type,:data,:refer)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':type',$type);
$stmt->bindParam(':data',$data);
$stmt->bindParam(':refer',$refer);
if($stmt->execute())
{
    $response['message']='Booking done';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}