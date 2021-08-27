<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='holiday';
$data=json_decode(file_get_contents('php://input'));
$title=$data->title;
$location=$data->location;
$price=$data->price;
$id=$data->id;
$query='update '.$table.'set title=:title,location=:location,price=:price where id=:id';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':location',$location);
$stmt->bindParam(':price',$price);
$stmt->bindParam(':id',$id);
if($stmt->execute())
{
    $response['message']='Holiday updated';
    echo json_encode($response);
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>