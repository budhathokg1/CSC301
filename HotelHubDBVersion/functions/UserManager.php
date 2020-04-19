<?php

class UserManager{
    public static function getUsers(){
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

        $query='SELECT * FROM user';
        $q=$pdo->prepare($query);
        $q->execute();

        return $q->fetchAll();
    }
    public static function createUser($firstName, $lastName, $email, $password, $userType){
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

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return '<div class="alert alert-danger" role="alert">The email is invalid!</div>';
        $email = strtolower($email);

        $password = trim($password);
        if(strlen($password)<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';

        $query='SELECT userID FROM user WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$email]);

        if($q->rowCount()>0) return '<div class="alert alert-danger" role="alert">The email entered is already regestered!</div>';

        $password=password_hash($password, PASSWORD_DEFAULT);

        $query='INSERT INTO user (firstName, lastName, email, password, userType) VALUES (?,?,?,?,?)';
        $q=$pdo->prepare($query);
        $q->execute([$firstName, $lastName, $email, $password, $userType]);
    }
    public static function getUser($id){
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

        $query='SELECT * FROM user WHERE userID=?';
        $q=$pdo->prepare($query);
        $q->execute([$id]);

        return $q->fetch();
    }
    public static function getUserFromEmail($email){
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

        $query='SELECT firstName, lastName FROM user WHERE email=?';
        $q=$pdo->prepare($query);
        $q->execute([$email]);

        return $q->fetch();
    }
    public static function modifyUser($id, $firstName, $lastName, $email, $password, $userType){
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
        
        $user=self::getUser($id);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return '<div class="alert alert-danger" role="alert">The email is invalid!</div>';
        $email = strtolower($email);

        $password = trim($password);
        if(strlen($password)<8) return '<div class="alert alert-danger" role="alert">Password must be at least 8 characters long!</div>';
        
        if(strcmp($email, $user['email']) != 0){
            
            $query='SELECT userID FROM user WHERE email=?';
            $q=$pdo->prepare($query);
            $q->execute([$email]);

            if($q->rowCount()>0) return '<div class="alert alert-danger" role="alert">The email entered is already regestered!</div>';

        }
        
        if(strcmp($password, $user['password']) != 0){
            $password=password_hash($password, PASSWORD_DEFAULT);
        }

        $query='UPDATE user SET firstName=?, lastName=?, email=?, password=?, userType=? WHERE userID=?';
        $q=$pdo->prepare($query);
        $q->execute([$firstName, $lastName, $email, $password, $userType, $id]);
    }
}