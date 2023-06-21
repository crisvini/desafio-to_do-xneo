<?php

class Db
{
    public static function openConnection()
    {
        $dbCredentials = [
            'HOST' => '127.0.0.1',
            'USERNAME' => 'root',
            'PASSWORD' => '',
            'DATABASE' => 'to_do'
        ];

        try {
            $dsn = 'mysql:host=' . $dbCredentials['HOST'] . ';dbname=' . $dbCredentials['DATABASE'] . ';charset=utf8mb4';
            $pdo = new PDO($dsn, $dbCredentials['USERNAME'], $dbCredentials['PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die(json_encode(['status' => 500, 'message' => 'INTERNAL SERVER ERROR', 'e' => json_encode($e)]));
        }
    }
}
