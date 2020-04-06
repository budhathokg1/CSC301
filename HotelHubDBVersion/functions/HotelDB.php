<?php

class Hotel{
    public static function getHotels(){
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

        $query='SELECT * FROM hotel';
        $q=$pdo->prepare($query);
        $q->execute();

        return $q->fetchAll();
    }

    public static function getHotel($id){
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

        $query='SELECT * FROM hotel WHERE hotelID=?';
        $q=$pdo->prepare($query);
        $q->execute([$id]);

        return $q->fetch();
    }

    public static function getRooms($HotelID){
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

        $query='SELECT * FROM room WHERE hotelID=?';
        $q=$pdo->prepare($query);
        $q->execute([$HotelID]);

        return $q->fetchAll();
    }
    public static function updateHotel($id, $hotelName, $hotelURL, $streetName, $city, $state, $zipCode){
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

        $query='UPDATE hotel SET hotelName=?, hotelImageUrl=?, streetName=?, city=?, state=?, zipcode=? WHERE hotelID=?';

        $q=$pdo->prepare($query);
        $q->execute([$hotelName, $hotelURL, $streetName, $city, $state, $zipCode, $id]);

    }
    public static function createHotel($hotelName, $hotelURL, $streetName, $city, $state, $zipCode){
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
        
        
        $query='INSERT INTO hotel (hotelName, hotelImageUrl, streetName, city, state, zipCode) VALUES (?,?,?,?,?,?)';

        $q=$pdo->prepare($query);
        $q->execute([$hotelName, $hotelURL, $streetName, $city, $state, $zipCode]);
    }
    public static function deleteHotel($id){
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

        $query='DELETE FROM hotel WHERE hotelID=?';
        $q=$pdo->prepare($query);
        $q->execute([$id]);
    }
}