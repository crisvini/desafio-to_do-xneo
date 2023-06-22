<?php

include_once 'Db.php';
date_default_timezone_set('America/Sao_Paulo');

class Methods
{
    public static function createTask($data)
    {
        $pdo = Db::openConnection();

        $title = filter_var($data['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($data['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $status_id = $data['status_id'];

        try {
            $tasks = $pdo->prepare('INSERT INTO tasks (title, description, status_id, conclusion) VALUES (:title, :description, :status_id, "' . ($status_id == 4 ? date('Y-m-d H:i:s') : null) . '")');
            $tasks->bindParam(':title', $title);
            $tasks->bindParam(':description', $description);
            $tasks->bindParam(':status_id', $status_id);
            $tasks->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }

    public static function viewTasks($from, $ajax = false)
    {
        $pdo = Db::openConnection();

        try {
            $tasks = $pdo->prepare("SELECT t.id, t.title, t.description, t.created, t.conclusion, t.status_id, s.name status, s.status_icon, s.status_class FROM tasks t JOIN status s ON t.status_id = s.id ORDER BY status_id");
            $tasks->execute();
            $tasksData = $tasks->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        if ($from == 'kanban') {
            $backlog = [];
            $to_do = [];
            $doing = [];
            $done = [];

            foreach ($tasksData as $key => $task) {
                if ($task['status_id'] == 1) array_push($backlog, $task);
                else if ($task['status_id'] == 2) array_push($to_do, $task);
                else if ($task['status_id'] == 3) array_push($doing, $task);
                else if ($task['status_id'] == 4) array_push($done, $task);
            }

            $tasksArray = ['backlog' => $backlog, 'to_do' => $to_do, 'doing' => $doing, 'done' => $done];

            if ($ajax) {
                echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksArray]);
                die();
            }
            return json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksArray]);
            die();
        } else if ($from == 'table') {
            if ($ajax) {
                echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksData]);
                die();
            }
            return json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksData]);
            die();
        }
    }

    public static function deleteTask($data)
    {
        $pdo = Db::openConnection();

        try {
            $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
            $stmt->bindParam(':id', $data['id']);
            $stmt->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }
}
