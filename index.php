<!-- Inclusão do arquivo de componentes -->
<?php include_once './components/Components.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?= Components::head('Home'); ?>

<body class="background-6">
    <nav class="background-7 nav">
        <?= Components::nav('See list'); ?>
    </nav>

    <header class="header">
        <span class="text-8 fs-3">Tasks - <span class="kanban">Kanban board</span></span>
    </header>


    <main class="main background-7">
        <ul id="backlog" class="column">
            <div class="column-header backlog">
                <span class="text-8"><i class="bi bi-journal"></i>&nbsp;Backlog</span>
            </div>
            <li class="card">
                <div class="card-title">
                    <span class="text-3">SQL Injection prevention</span>
                </div>
                <div class="card-description">
                    <span>We have to resolve this asap</span>
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