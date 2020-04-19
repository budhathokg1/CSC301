<?php
include_once("HotelDB.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $hotelId = $_POST['hotelId'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    Hotel::storeComment($email, $hotelId, $comment);
    echo "success";
  } 

?>