<?php

include_once 'Db.php';
date_default_timezone_set('America/Sao_Paulo');

// Nesse arquivo, ficam todos os métodos necessários para a comunicação do frontend com o backend
class Methods
{
    // Criação de task
    public static function createTask($data)
    {
        $pdo = Db::openConnection();

        $title = filter_var($data['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_var($data['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $status_id = $data['status_id'];

        try {
            $tasks = $pdo->prepare('INSERT INTO tasks (title, description, status_id, concluded) VALUES (:title, :description, :status_id, "' . ($status_id == 4 ? date('Y-m-d H:i:s') : null) . '")');
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

    // Retorna os dados das tasks ou task, dependendo de onde foi chamado
    public static function readTask($data)
    {
        $pdo = Db::openConnection();

        try {
            if ($data['id']) {
                $task = $pdo->prepare("SELECT t.id, t.title, t.description, t.created, t.concluded, t.status_id, s.name status, s.icon, s.class FROM tasks t JOIN status s ON t.status_id = s.id WHERE t.id = :id ORDER BY status_id");
                $task->bindParam(':id', $data['id']);
                $task->execute();
                $taskData = $task->fetch(PDO::FETCH_ASSOC);
            } else {
                $tasks = $pdo->prepare("SELECT t.id, t.title, t.description, t.created, t.concluded, t.status_id, s.name status, s.icon, s.class FROM tasks t JOIN status s ON t.status_id = s.id ORDER BY status_id");
                $tasks->execute();
                $tasksData = $tasks->fetchAll(PDO::FETCH_ASSOC);

                if ($data['from'] == 'kanban') {
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

                    $tasksData = ['backlog' => $backlog, 'to_do' => $to_do, 'doing' => $doing, 'done' => $done];
                }
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        if ($data['ajax'] && !$data['id']) {
            echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksData]);
            die();
        } else if ($data['ajax'] && $data['id']) {
            $taskData['created'] = date('m/d/Y H:i', strtotime($taskData['created']));
            if ($taskData['concluded'] == '0000-00-00 00:00:00') $taskData['concluded'] = null;
            else $taskData['concluded'] = date('m/d/Y H:i', strtotime($taskData['concluded']));
            echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $taskData]);
            die();
        }
        return json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $tasksData]);
        die();
    }

    // Atualiza uma task
    public static function updateTask($data)
    {
        $pdo = Db::openConnection();

        try {
            $task = $pdo->prepare("UPDATE tasks SET title = :title, description = :description, status_id = :status_id, concluded = '" . ($data['status_id'] == 4 ? date('Y-m-d H:i:s') : null) . "' WHERE id = :id");
            $task->bindParam(':title', $data['title']);
            $task->bindParam(':description', $data['description']);
            $task->bindParam(':status_id', $data['status_id']);
            $task->bindParam(':id', $data['id']);
            $task->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }
        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }

    // Deleta uma task
    public static function deleteTask($data)
    {
        $pdo = Db::openConnection();

        try {
            $delete = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
            $delete->bindParam(':id', $data['id']);
            $delete->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }

        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }

    // Retorna os options do select de status
    public static function returnStatusOptions($data)
    {
        $pdo = Db::openConnection();

        try {
            $status = $pdo->prepare("SELECT * FROM status");
            $status->execute();
            $statusData = $status->fetchAll(PDO::FETCH_ASSOC);

            $selectHtmlOptions = '';

            if ($data['status_id']) foreach ($statusData as $key => $status) $selectHtmlOptions .= '<option class="' . $status['class'] . '" value="' . $status['id'] . '"' . ($status['id'] == $data['status_id'] ? ' selected' : '') . '>' . $status['name'] . '</option>';
            else foreach ($statusData as $key => $status) $selectHtmlOptions .= '<option class="' . $status['class'] . '" value="' . $status['id'] . '">' . $status['name'] . '</option>';
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }
        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null, 'data' => $selectHtmlOptions]);
        die();
    }

    // Atualiza o status da task quando um card do kanban é movido para outro status
    public static function updateStatusKanban($data)
    {
        $pdo = Db::openConnection();

        try {
            $task = $pdo->prepare("UPDATE tasks SET status_id = :status_id, concluded = '" . ($data['status_id'] == 4 ? date('Y-m-d H:i:s') : null) . "' WHERE id = :id");
            $task->bindParam(':status_id', $data['status_id']);
            $task->bindParam(':id', $data['id']);
            $task->execute();
        } catch (PDOException $e) {
            echo json_encode(['status' => 500, 'message' => 'Internal Server Error', 'error' => $e]);
            die();
        }
        echo json_encode(['status' => 200, 'message' => 'OK', 'error' => null]);
        die();
    }
}
