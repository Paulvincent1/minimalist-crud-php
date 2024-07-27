<?php 

include('database.php');

$id = $_GET['id'];
$sql = "DELETE FROM STUDENT WHERE ID = {$id}";
$result = $conn->query($sql);

if($result){
    header('Location: index.php');
}

?>