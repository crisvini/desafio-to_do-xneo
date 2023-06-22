$(document).ready(function () {
    $('.update-task').click(function () {
        if ($(this).is('td')) updateTask({ id: $(this).closest('tr').attr('id'), from: $(this).closest('tr').attr('from') });
        else updateTask({ id: $(this).closest('li').attr('id'), from: $(this).closest('li').attr('from') });
    });

    $(document).on('click', '.delete-task', function () {
        if ($(this).is('td')) deleteTask({ id: $(this).closest('tr').attr('id'), from: $(this).closest('tr').attr('from') });
        else deleteTask({ id: $(this).closest('li').attr('id'), from: $(this).closest('li').attr('from') });
    });

    $(document).on('input', 'input.validate, textarea.validate', function () {
        validation()
    });
})

async function createTask({ from }) {
    await Swal.fire({
        title: `New task`,
        html: ` <div class="update-task-div">
                    <label class="custom-label" for="task_title">Title</label>
                    <input class="custom-input validate" id="task_title">
                    <label class="custom-label" for="task_description">Description</label>
                    <textarea class="custom-textarea validate" id="task_description" rows="10"></textarea>
                    <label class="custom-label" for="task_status">Status</label>
                    <select class="custom-select" id="task_status">
                        <option class="backlog-text" value="1">Backlog</option>
                        <option class="to-do-text" value="2">To do</option>
                        <option class="doing-text" value="3">Doing</option>
                        <option class="done-text" value="4">Done</option>
                    </select>
                </div>`,
        focusConfirm: false,
        showDenyButton: true,
        confirmButtonText: 'Create',
        denyButtonText: 'Cancel',
        willOpen: () => {
            validation(true);
        },
        customClass: {
            title: 'custom-title',
            actions: 'custom-actions',
            htmlContainer: 'custom-htmlContainer'
        },
        preConfirm: () => {
            $.ajax({
                type: 'POST',
                url: './ajax/ajax.php',
                data: {
                    'method': 'createTask',
                    'data': {
                        'title': $('#task_title').val(),
                        'description': $('#task_description').val(),
                        'status_id': $('#task_status').val()
                    }
                },
                success: function (result) {
                    result = JSON.parse(result);
                    if (result.status !== 200) error({ code: result.status, message: result.message })
                    else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Task created with success!',
                            showConfirmButton: false,
                            position: 'bottom-end',
                            timer: 2000,
                        }).then(() => {
                            if (from == 'table') {
                                location.reload();
                            } else {
                                updateKanban();
                            }
                        });
                    }
                }
            });
        }
    })
}

async function updateTask({ id, from }) {
    await Swal.fire({
        title: `Edit task ${id.slice(-1)}`,
        html: ` <div class="update-task-div">
                    <label class="custom-label" for="task_title">Title</label>
                    <input class="custom-input validate" id="task_title">
                    <label class="custom-label" for="task_description">Description</label>
                    <textarea class="custom-textarea validate" id="task_description" rows="10"></textarea>
                    <label class="custom-label" for="task_status">Status</label>
                    <select class="custom-select" id="task_status">
                        <option class="backlog-text" value="1">Backlog</option>
                        <option class="to-do-text" value="2">To do</option>
                        <option class="doing-text" value="3">Doing</option>
                        <option class="done-text" value="4">Done</option>
                    </select>
                </div>`,
        focusConfirm: false,
        showDenyButton: true,
        denyButtonText: 'Cancel',
        confirmButtonText: 'Save',
        customClass: {
            title: 'custom-title',
            actions: 'custom-actions',
            htmlContainer: 'custom-htmlContainer'
        },
        preConfirm: () => {
            return [
                $('#task_title').val(),
                $('#task_description').val(),
                $('#task_status').val()
            ]
        }
    })
}

function deleteTask({ id, from }) {
    Swal.fire({
        icon: 'warning',
        title: `Are you shure you want to delete task ${id.slice(-1)}?`,
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'Cancel',
        position: 'bottom-end'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire('Saved!', '', 'success')
        }
    });
}

function error({ code, message }) {
    Swal.fire({
        icon: 'error',
        title: 'Error processing your solicitation, try again later',
        text: `Error ${code} - ${message}`,
        confirmButtonText: 'Ok',
        position: 'bottom-end'
    });
}

function validation(button = false) {
    if (button) {
        $('.validate').each(function () {
            if (!$(this).val()) {
                $('.swal2-confirm').attr('disabled', 'disabled')
            } else {
                $('.swal2-confirm').removeAttr('disabled')
            }
        });
    } else {
        $('.validate').each(function () {
            if (!$(this).val()) {
                if ($(this).hasClass('validate')) $(this).addClass('incorrect');
            } else {
                if ($(this).hasClass('validate')) $(this).removeClass('incorrect');
            }
        });

        if ($('.incorrect').length == 0) $('.swal2-confirm').removeAttr('disabled');
        else $('.swal2-confirm').attr('disabled', 'disabled');
    }
}
