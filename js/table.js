// Esse arquivo possui funções específicas da tela table

$(document).ready(function () {
    // Inicialização da tabela usando a biblioteca datatables.js
    $('#task_table').DataTable({
        "lengthChange": false,
        "pageLength": 15,
        "pagingType": "full_numbers",
        "info": false
    });
});

// Função que atualiza os dados da tabela
function updateTable() {
    $.ajax({
        type: 'POST',
        url: './ajax/ajax.php',
        data: {
            'method': 'readTask',
            'data': {
                'from': 'table',
                'ajax': true,
                'id': null
            }
        },
        success: function (result) {
            var json = JSON.parse(result);

            var trHtml = '';
            json.data.forEach((task, key) => {
                var taskTitle = task.title.length > 20 ? (task.title.substring(0, 20) + '...') : task.title;
                var taskDescription = task.description.length > 20 ? (task.description.substring(0, 20) + '...') : task.description;
                var taskCreated = new Date(task.created).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.created).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false });
                var taskConcluded = task.concluded == '0000-00-00 00:00:00' ? 'Not concluded' : new Date(task.concluded).toLocaleDateString("en-US", { month: "2-digit", day: "2-digit", year: "numeric" }) + " " + new Date(task.concluded).toLocaleTimeString("en-US", { hour: "2-digit", minute: "2-digit", hour12: false });
                trHtml += `
                            <tr id="${task.id}" from="table" class="pointer row">
                                <td class="text-5 update-task">${task.id}</td>
                                <td class="text-8 update-task">${taskTitle}</td>
                                <td class="text-8 update-task">${taskDescription}</td>
                                <td class="${task.class} update-task">${task.icon}&nbsp;${task.status}</td>
                                <td class="text-8 update-task">${taskCreated}</td>
                                <td class="text-8 update-task">${taskConcluded}</td>
                                <td class="text-8 delete-task"><i class="bi bi-trash"></i></td>
                            </tr>`;
            });

            var table = `
                        <table class="w-100" id="task_table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-5">id</th>
                                    <th scope="col" class="text-3">name</th>
                                    <th scope="col" class="text-3">description</th>
                                    <th scope="col" class="text-3">status</th>
                                    <th scope="col" class="text-3">created</th>
                                    <th scope="col" class="text-3">concluded</th>
                                    <th scope="col" class="text-3">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${trHtml}
                            </tbody>
                        </table>`;

            $('#task_table_wrapper').remove();
            $('#main_table').append(table);

            $('#task_table').DataTable({
                "lengthChange": false,
                "pageLength": 15,
                "pagingType": "full_numbers",
                "info": false
            });
        }
    });
}