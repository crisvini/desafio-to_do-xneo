<?php
// Inclusão do arquivo de includes
include_once './includes/includes.php';

$tasks = json_decode(Methods::viewTasks('table'), true);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Inclusão do head -->
<?= Components::head('Table', 'table'); ?>

<body class="background-6">
    <nav class="background-7 nav">
        <!-- Inclusão da barra de navegação  -->
        <?= Components::nav('/desafio-to_do-xneo/kanban.php', '<i class="bi bi-kanban"></i>&nbsp;See kanban'); ?>
    </nav>

    <header class="header">
        <span class="text-8 fs-3">Tasks - Table</span>
        <button class="button-1" onclick="createTask({from: 'table'})"><i class="bi bi-plus-circle"></i>&nbsp;New task</button>
    </header>

    <main class="main-table background-7">
        <table class="w-100" id="task_table">
            <thead>
                <tr>
                    <th scope="col" class="text-5">id</th>
                    <th scope="col" class="text-3">name</th>
                    <th scope="col" class="text-3">description</th>
                    <th scope="col" class="text-3">status</th>
                    <th scope="col" class="text-3">created</th>
                    <th scope="col" class="text-3">conclusion</th>
                    <th scope="col" class="text-3">delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks['data'] as $key => $task) { ?>
                    <tr id="<?= $task['id'] ?>" from="table" class="pointer row">
                        <td class="text-5 update-task"><?= $task['id'] ?></td>
                        <td class="text-8 update-task"><?= strlen($task['title']) > 20 ? (substr($task['title'], 0, 20) . '...') : $task['title'] ?></td>
                        <td class="text-8 update-task"><?= strlen($task['description']) > 20 ? (substr($task['description'], 0, 20) . '...') : $task['description'] ?></td>
                        <td class="<?= $task['status_class'] ?> update-task"><?= $task['status_icon'] ?>&nbsp;<?= $task['status'] ?></td>
                        <td class="text-8 update-task"><?= date('m/d/Y H:i', strtotime($task['created'])) ?></td>
                        <td class="text-8 update-task"><?= strtotime($task['conclusion']) > strtotime("0000-00-00 00:00:00") ? date('m/d/Y H:i', strtotime($task['conclusion'])) : 'Not concluded' ?></td>
                        <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>