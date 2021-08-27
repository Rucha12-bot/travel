  
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include_once'./config/database.php';

$table='holiday';
$data=json_decode(file_get_contents('php://input'));
$title=$data->title;
$location=$data->location;
$query='insert into '.$table.'(title,location) values (:title,:location)';
$stmt=$pdo->prepare($query);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':location',$location);
if($stmt->execute())
{
    $response['message']='holiday done';
    echo json_encode($response);
    
}
else
{
    $response['message']='error occured';
    echo json_encode($response);
}
?>