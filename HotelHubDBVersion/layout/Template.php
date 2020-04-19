<?php

class Template{

    public static function Header(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <title>HotelHub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="assets/js/hotelComments.js"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>
        <?php
    }

    public static function Footer(){
        ?>
        </body>
        </html>
        <?php
    }
}
?>