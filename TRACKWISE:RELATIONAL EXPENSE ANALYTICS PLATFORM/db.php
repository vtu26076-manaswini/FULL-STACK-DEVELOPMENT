<?php
$conn = new mysqli("localhost","root","","trackwise_ui");

if($conn->connect_error){
    die("Database Error: ".$conn->connect_error);
}
?>
