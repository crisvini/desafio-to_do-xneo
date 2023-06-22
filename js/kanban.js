$(document).ready(function () {
    Sortable.create(document.getElementById('backlog'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista backlog');
        }
    });

    Sortable.create(document.getElementById('to_do'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista to_do');
        }
    });

    Sortable.create(document.getElementById('doing'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista doing');
        }
    });

    Sortable.create(document.getElementById('done'), {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista done');
        }
    });
});

function updateKanban() {
    $.ajax({
        type: 'POST',
        url: './ajax/ajax.php',
        data: {
            'method': 'viewTasks',
            'from': 'kanban',
            'ajax': true
        },
        success: function (result) {
            var json = JSON.parse(result);

            var backlogHtml = '';
            var toDoHtml = '';
            var doingHtml = '';
            var doneHtml = '';

            $('.column-header.backlog').nextAll().remove()
            $('.column-header.to-do').nextAll().remove()
            $('.column-header.doing').nextAll().remove()
            $('.column-header.done').nextAll().remove()

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
                                                    <span class="mt-1">Concluded: ${new Date(task.conclusion).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.conclusion).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false })}</span>
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
            $('.column-header.backlog').after(backlogHtml);
            $('.column-header.to-do').after(toDoHtml);
            $('.column-header.doing').after(doingHtml);
            $('.column-header.done').after(doneHtml);
        }
    });
}