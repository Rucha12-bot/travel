<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='flights';
$data=json_decode(file_get_contents('php://input'));

$name=$data->name;
$origin=$data->origin;
$dest=$data->dest;
$company=$data->company;
$query='insert into '.$table.'(name,origin,dest,company) values (:name,:origin,:dest,:company)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':origin',$origin);
$stmt->bindParam(':dest',$dest);
$stmt->bindParam(':company',$company);
if($stmt->execute())
{
    $response['message']='flight done';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}