<!-- Inclusão do arquivo de includes -->
<?php include_once './includes/includes.php'; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Inclusão do head -->
<?= Components::head('Kanban', 'index'); ?>

<body class="background-6">
    <nav class="background-7 nav">
        <!-- Inclusão da barra de navegação  -->
        <?= Components::nav('table.php', '<i class="bi bi-list-task"></i>&nbsp;See table'); ?>
    </nav>

    <header class="header">
        <span class="text-8 fs-3">Tasks - <span class="kanban">Kanban board</span></span>
        <button class="button-1" onclick="newTask({from: 'kanban'})"><i class="bi bi-plus-circle"></i>&nbsp;New task</button>
    </header>

    <main class="main background-7">
        <ul id="backlog" class="column">
            <div class="column-header backlog">
                <span><i class="bi bi-journal"></i>&nbsp;Backlog</span>
            </div>
            <li class="card grab" id="1" from="kanban">
                <div class="card-title">
                    <span class="text-3">SQL Injection prevention</span>
                </div>
                <div class="card-description">
                    <span>We need to resolve this asap</span>
                </div>
                <div class="card-footer">
                    <div>
                        <span class="card-id"># 1</span>
                    </div>
                    <div class="card-footer-functions">
                        <a id="1" class="edit-task link-1"><i class="bi bi-pencil"></i></a>
                        <a id="1" class="delete-task link-1"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="to_do" class="column">
            <div class="column-header to-do">
                <span><i class="bi bi-list-task"></i>&nbsp;To do</span>
            </div>
            <li class="card grab" id="2" from="kanban">
                <div class="card-title">
                    <span class="text-3">DDoS prevention</span>
                </div>
                <div class="card-description">
                    <span>Another asap task</span>
                </div>
                <div class="card-footer">
                    <div>
                        <span class="card-id"># 2</span>
                    </div>
                    <div class="card-footer-functions">
                        <a id="1" class="edit-task link-1"><i class="bi bi-pencil"></i></a>
                        <a id="1" class="delete-task link-1"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="doing" class="column">
            <div class="column-header doing">
                <span><i class="bi bi-clock"></i>&nbsp;Doing</span>
            </div>
            <li class="card grab" id="3" from="kanban">
                <div class="card-title">
                    <span class="text-3">Create new logos</span>
                </div>
                <div class="card-description">
                    <span>New logos on green</span>
                </div>
                <div class="card-footer">
                    <div>
                        <span class="card-id"># 3</span>
                    </div>
                    <div class="card-footer-functions">
                        <a id="1" class="edit-task link-1"><i class="bi bi-pencil"></i></a>
                        <a id="1" class="delete-task link-1"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="done" class="column">
            <div class="column-header done">
                <span><i class="bi bi-check2-circle"></i>&nbsp;Done</span>
            </div>
            <li class="card grab" id="4" from="kanban">
                <div class="card-title">
                    <span class="text-3">Change company name</span>
                </div>
                <div class="card-description">
                    <span>Sugestions?</span>
                </div>
                <div class="card-footer">
                    <div>
                        <span class="card-id"># 4</span>
                    </div>
                    <div class="card-footer-functions">
                        <a id="1" class="edit-task link-1"><i class="bi bi-pencil"></i></a>
                        <a id="1" class="delete-task link-1"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </li>
        </ul>
    </main>
</body>

</html>