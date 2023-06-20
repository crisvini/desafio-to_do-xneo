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

    <main>
        <div class="list-container">
            <ul id="list1" class="shared-list">
                <li data-id="1">Item 1</li>
                <li data-id="2">Item 2</li>
                <li data-id="3">Item 3</li>
            </ul>
        </div>

        <div class="list-container">
            <ul id="list2" class="shared-list">
                <li data-id="4">Item 4</li>
                <li data-id="5">Item 5</li>
                <li data-id="6">Item 6</li>
            </ul>
        </div>
    </main>
</body>

</html>