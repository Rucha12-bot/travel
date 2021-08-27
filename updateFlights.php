<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='flights';
$data=json_decode(file_get_contents('php://input'));
$name=$data->name;
$origin-$data->origin;
$dest=$data->dest;
$company=$data->company;
$id=$data->id;
$query='update '.$table.' set name=:name,origin=:origin,dest=:dest,company=:company where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':origin',$origin);
$stmt->bindParam(':dest',$dest);
$stmt->bindParam(':company',$company);
if($stmt->execute())
{
    $response['message']='Flight details updated';
    echo json_encode($response);
}
else
{
    $response['message']='Error occured';
    echo json_encode($response);
}
?>