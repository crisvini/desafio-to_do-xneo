<?php

include_once 'Db.php';
date_default_timezone_set('America/Sao_Paulo');

class Methods
{
    public static function newTask($method, $data)
    {
        $pdo = Db::openConnection();

        $title = filter_var($data['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($data['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $status_id = $data['status_id'];

        try {
            $access_logs = $pdo->prepare('INSERT INTO tasks (title, description, status_id, conclusion) VALUES (:title, :description, :status_id, "' . ($status_id == 4 ? date('Y-m-d H:i:s') : null) . '")');
            $access_logs->bindParam(':title', $title);
            $access_logs->bindParam(':description', $description);
            $access_logs->bindParam(':status_id', $status_id);
            $access_logs->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }
}
