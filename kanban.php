<?php
// Inclusão do arquivo de includes
include_once './includes/includes.php';

// Método que retorna as tasks
$tasks = json_decode(Methods::readTask(['from' => 'kanban', 'ajax' => null, 'id' => null]), true);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Inclusão do head -->
<?= Components::head('Kanban', 'kanban'); ?>

<body class="background-6">
    <nav class="background-7 nav">
        <!-- Inclusão da barra de navegação  -->
        <?= Components::nav('table.php', '<i class="bi bi-list-task"></i>&nbsp;See table'); ?>
    </nav>

    <header class="header">
        <span class="text-8 fs-3">Tasks - <span class="kanban">Kanban board</span></span>
        <button class="button-1" onclick="createTask({from: 'kanban'})"><i class="bi bi-plus-circle"></i>&nbsp;New task</button>
    </header>

    <main class="main background-7">
        <div class="column">
            <div class="column-header backlog">
                <span><i class="bi bi-journal"></i>&nbsp;Backlog</span>
            </div>
            <ul id="backlog">
                <?php foreach ($tasks['data']['backlog'] as $key => $task) { ?>
                    <li class="card grab" id="task_<?= $task['id'] ?>" from="kanban">
                        <div class="card-title">
                            <span class="text-3"><?= $task['title'] ?></span>
                        </div>
                        <div class="card-description">
                            <span><?= $task['description'] ?></span>
                        </div>
                        <div class="card-date">
                            <span>Created: <?= date('m/d/Y H:i', strtotime($task['created'])) ?></span>
                        </div>
                        <div class="card-footer">
                            <div>
                                <span class="card-id"># <?= $task['id'] ?></span>
                            </div>
                            <div class="card-footer-functions">
                                <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="column">
            <div class="column-header to-do">
                <span><i class="bi bi-list-task"></i>&nbsp;To do</span>
            </div>
            <ul id="to_do">
                <?php foreach ($tasks['data']['to_do'] as $key => $task) { ?>
                    <li class="card grab" id="task_<?= $task['id'] ?>" from="kanban">
                        <div class="card-title">
                            <span class="text-3"><?= $task['title'] ?></span>
                        </div>
                        <div class="card-description">
                            <span><?= $task['description'] ?></span>
                        </div>
                        <div class="card-date">
                            <span>Created: <?= date('m/d/Y H:i', strtotime($task['created'])) ?></span>
                        </div>
                        <div class="card-footer">
                            <div>
                                <span class="card-id"># <?= $task['id'] ?></span>
                            </div>
                            <div class="card-footer-functions">
                                <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="column">
            <div class="column-header doing">
                <span><i class="bi bi-clock"></i>&nbsp;Doing</span>
            </div>
            <ul id="doing">
                <?php foreach ($tasks['data']['doing'] as $key => $task) { ?>
                    <li class="card grab" id="task_<?= $task['id'] ?>" from="kanban">
                        <div class="card-title">
                            <span class="text-3"><?= $task['title'] ?></span>
                        </div>
                        <div class="card-description">
                            <span><?= $task['description'] ?></span>
                        </div>
                        <div class="card-date">
                            <span>Created: <?= date('m/d/Y H:i', strtotime($task['created'])) ?></span>
                        </div>
                        <div class="card-footer">
                            <div>
                                <span class="card-id"># <?= $task['id'] ?></span>
                            </div>
                            <div class="card-footer-functions">
                                <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="column">
            <div class="column-header done">
                <span><i class="bi bi-check2-circle"></i>&nbsp;Done</span>
            </div>
            <ul id="done">
                <?php foreach ($tasks['data']['done'] as $key => $task) { ?>
                    <li class="card grab" id="task_<?= $task['id'] ?>" from="kanban">
                        <div class="card-title">
                            <span class="text-3"><?= $task['title'] ?></span>
                        </div>
                        <div class="card-description">
                            <span><?= $task['description'] ?></span>
                        </div>
                        <div class="card-date">
                            <span>Created: <?= date('m/d/Y H:i', strtotime($task['created'])) ?></span>
                            <span class="mt-1">Concluded: <?= date('m/d/Y H:i', strtotime($task['concluded'])) ?></span>
                        </div>
                        <div class="card-footer">
                            <div>
                                <span class="card-id"># <?= $task['id'] ?></span>
                            </div>
                            <div class="card-footer-functions">
                                <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </main>
</body>

</html>