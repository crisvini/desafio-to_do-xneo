<!-- Inclusão do arquivo de componentes -->
<?php include_once './components/Components.php'; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Inclusão do head -->
<?= Components::head('Home'); ?>

<body class="background-6">
    <nav class="background-7 nav">
        <!-- Inclusão da barra de navegação  -->
        <?= Components::nav('See list'); ?>
    </nav>

    <header class="header">
        <span class="text-8 fs-3">Tasks - <span class="kanban">Kanban board</span></span>
        <button class="button-1"><i class="bi bi-plus-circle"></i>&nbsp;New task</button>
    </header>

    <main class="main background-7">
        <ul id="backlog" class="column">
            <div class="column-header backlog">
                <span class="text-8"><i class="bi bi-journal"></i>&nbsp;Backlog</span>
            </div>
            <li class="card grab">
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
                        <a id="view-1" class="link-1" onclick="viewTask({id: $(this).attr('id'), from: 'kanban'})"><i class="bi bi-eye"></i></a>
                        <a id="edit-1" class="link-1" onclick="editTask({id: $(this).attr('id'), from: 'kanban'})"><i class="bi bi-pencil"></i></a>
                        <a id="delete-1" class="link-1" onclick="deleteTask({id: $(this).attr('id'), from: 'kanban'})"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="to_do" class="column">
            <div class="column-header to-do">
                <span class="text-8"><i class="bi bi-list-task"></i>&nbsp;To do</span>
            </div>
        </ul>
        <ul id="doing" class="column">
            <div class="column-header doing">
                <span class="text-8"><i class="bi bi-clock"></i>&nbsp;Doing</span>
            </div>
        </ul>
        <ul id="done" class="column">
            <div class="column-header done">
                <span class="text-8"><i class="bi bi-check2-circle"></i>&nbsp;Done</span>
            </div>
        </ul>
    </main>
</body>

</html>