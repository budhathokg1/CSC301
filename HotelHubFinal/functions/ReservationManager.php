<?php 
    class Reservation{
        public static function MakeReservation($userID, $hotelID, $roomNum, $beginDate, $endDate){
            $settings=[
                'host'=>'localhost',
                'db'=>'dbhotelhub',
                'user'=>'root',
                'pass'=>''
            ];
            
            $opt=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $pdo= new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].
            ';charset=utf8mb4', $settings['user'], $settings['pass'], $opt);

            $query='SELECT bookID 
            FROM book 
            WHERE roomNumber = ?
            AND startDate BETWEEN CAST(? AS DATE) AND CAST(? AS DATE) 
            OR endDate BETWEEN CAST(? AS DATE) AND CAST(? AS DATE)';

            $q=$pdo->prepare($query);
            $q->execute([$roomNum, $beginDate, $endDate, $beginDate, $endDate]);

            if($q->rowCount()>0) return '<div class="alert alert-danger" role="alert">There is a reservation already made for your arrival date '.$beginDate.' and departure date '.$endDate.'</div>';

            $query='INSERT INTO book (userID, roomNumber, startDate, endDate) VALUES (?, ?, CAST(? AS DATE), CAST(? AS DATE))';
            $q=$pdo->prepare($query);
            $q->execute([$userID, $roomNum, $beginDate, $endDate]);
    

            return '<div class="alert alert-success" role="alert">Successfully made your reservation, you will pay at the hotel after your stay!</div>';
        }
    }