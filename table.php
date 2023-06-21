<!-- Inclusão do arquivo de includes -->
<?php include_once './includes/includes.php'; ?>

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
        <button class="button-1" onclick="newTask({from: 'table'})"><i class="bi bi-plus-circle"></i>&nbsp;New task</button>
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
                <tr id="1" from="table" class="pointer row">
                    <td class="text-5 edit-task">1</td>
                    <td class="text-8 edit-task">SQL Injection preven...</td>
                    <td class="text-8 edit-task">We need to resolve t..</td>
                    <td class="backlog-text edit-task"><i class="bi bi-journal"></i>&nbsp;Backlog</td>
                    <td class="text-8 edit-task">19/06/2023 14:56</td>
                    <td class="text-8 edit-task">Not concluded</td>
                    <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                </tr>
                <tr id="2" from="table" class="pointer row">
                    <td class="text-5 edit-task">2</td>
                    <td class="text-8 edit-task">DDoS prevention</td>
                    <td class="text-8 edit-task">Another asap task</td>
                    <td class="to-do-text edit-task"><i class="bi bi-list-task"></i>&nbsp;To do</td>
                    <td class="text-8 edit-task">19/06/2023 14:58</td>
                    <td class="text-8 edit-task">Not concluded</td>
                    <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                </tr>
                <tr id="3" from="table" class="pointer row">
                    <td class="text-5 edit-task">3</td>
                    <td class="text-8 edit-task">Create new logos</td>
                    <td class="text-8 edit-task">New logos on green</td>
                    <td class="doing-text edit-task"><i class="bi bi-clock"></i>&nbsp;Doing</td>
                    <td class="text-8 edit-task">19/06/2023 14:52</td>
                    <td class="text-8 edit-task">Not concluded</td>
                    <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                </tr>
                <tr id="4" from="table" class="pointer row">
                    <td class="text-5 edit-task">4</td>
                    <td class="text-8 edit-task">Change company name</td>
                    <td class="text-8 edit-task">Sugestions?</td>
                    <td class="done-text edit-task"><i class="bi bi-check2-circle"></i>&nbsp;Done</td>
                    <td class="text-8 edit-task">19/06/2023 14:50</td>
                    <td class="text-8 edit-task">21/06/2023 13:22</td>
                    <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>