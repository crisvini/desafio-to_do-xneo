// Esse arquivo possui funções específicas da tela kanban

$(document).ready(function () {
    // Inicialização da biblioteca sortable.js
    Sortable.create(document.getElementById('backlog'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (e) {
            updateStatusKanban({ id: e.item.id, status_id: 1 });
        }
    });

    Sortable.create(document.getElementById('to_do'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (e) {
            updateStatusKanban({ id: e.item.id, status_id: 2 });
        }
    });

    Sortable.create(document.getElementById('doing'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (e) {
            updateStatusKanban({ id: e.item.id, status_id: 3 });
        }
    });

    Sortable.create(document.getElementById('done'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (e) {
            updateStatusKanban({ id: e.item.id, status_id: 4 });
        }
    });
});

// Função que atualiza o quadro de kanban
function updateKanban() {
    $.ajax({
        type: 'POST',
        url: './ajax/ajax.php',
        data: {
            'method': 'readTask',
            'data': {
                'from': 'kanban',
                'ajax': true,
                'id': null
            }
        },
        success: function (result) {
            var json = JSON.parse(result);

            var backlogHtml = '';
            var toDoHtml = '';
            var doingHtml = '';
            var doneHtml = '';

            $('#backlog').empty();
            $('#to_do').empty();
            $('#doing').empty();
            $('#done').empty();

            for (var key in json.data) {
                if (json.data.hasOwnProperty(key)) {
                    var tasks = json.data[key];
                    for (var i = 0; i < tasks.length; i++) {
                        var task = tasks[i];
                        if (task.status_id == 1) {
                            backlogHtml += `
                                                <li class="card grab" id="task_${task.id}" from="kanban">
                                                    <div class="card-title">
                                                        <span class="text-3">${task.title}</span>
                                                    </div>
                                                    <div class="card-description">
                                                        <span>${task.description}</span>
                                                    </div>
                                                    <div class="card-date">
                                                        <span>Created: ${new Date(task.created).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.created).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div>
                                                            <span class="card-id"># ${task.id}</span>
                                                        </div>
                                                        <div class="card-footer-functions">
                                                            <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                                            <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                `;
                        } else if (task.status_id == 2) {
                            toDoHtml += `
                                            <li class="card grab" id="task_${task.id}" from="kanban">
                                                <div class="card-title">
                                                    <span class="text-3">${task.title}</span>
                                                </div>
                                                <div class="card-description">
                                                    <span>${task.description}</span>
                                                </div>
                                                <div class="card-date">
                                                    <span>Created: ${new Date(task.created).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.created).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
                                                </div>
                                                <div class="card-footer">
                                                    <div>
                                                        <span class="card-id"># ${task.id}</span>
                                                    </div>
                                                    <div class="card-footer-functions">
                                                        <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                                        <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                `;
                        } else if (task.status_id == 3) {
                            doingHtml += `
                                            <li class="card grab" id="task_${task.id}" from="kanban">
                                                <div class="card-title">
                                                    <span class="text-3">${task.title}</span>
                                                </div>
                                                <div class="card-description">
                                                    <span>${task.description}</span>
                                                </div>
                                                <div class="card-date">
                                                    <span>Created: ${new Date(task.created).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.created).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
                                                </div>
                                                <div class="card-footer">
                                                    <div>
                                                        <span class="card-id"># ${task.id}</span>
                                                    </div>
                                                    <div class="card-footer-functions">
                                                        <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                                        <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                `;
                        } else if (task.status_id == 4) {
                            doneHtml += `
                                            <li class="card grab" id="task_${task.id}" from="kanban">
                                                <div class="card-title">
                                                    <span class="text-3">${task.title}</span>
                                                </div>
                                                <div class="card-description">
                                                    <span>${task.description}</span>
                                                </div>
                                                <div class="card-date">
                                                    <span>Created: ${new Date(task.created).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.created).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
                                                    <span class="mt-1">Concluded: ${new Date(task.concluded).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.concluded).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
                                                </div>
                                                <div class="card-footer">
                                                    <div>
                                                        <span class="card-id"># ${task.id}</span>
                                                    </div>
                                                    <div class="card-footer-functions">
                                                        <a class="update-task link-1"><i class="bi bi-pencil"></i></a>
                                                        <a class="delete-task link-1"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                `;
                        }
                    }
                }
            }
            $('#backlog').append(backlogHtml);
            $('#to_do').append(toDoHtml);
            $('#doing').append(doingHtml);
            $('#done').append(doneHtml);
        }
    });
}

// Função que é chamada quando um card é movido de um status para outro no kanban
function updateStatusKanban({ id, status_id }) {
    $.ajax({
        type: 'POST',
        url: './ajax/ajax.php',
        data: {
            'method': 'updateStatusKanban',
            'data': {
                'status_id': status_id,
                'id': id.split("_").pop()
            }
        },
        success: function (result) {
            result = JSON.parse(result);
            if (result.status !== 200) error({ code: result.status, message: result.message });
            else updateKanban();
        }
    });
}