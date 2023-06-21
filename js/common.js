async function newTask({ from }) {
    await Swal.fire({
        title: `New task`,
        html: ` <div class="edit-task-div">
                    <label class="custom-label" for="task_title">Title</label>
                    <input class="custom-input" id="task_title">
                    <label class="custom-label" for="task_description">Description</label>
                    <textarea class="custom-textarea" id="task_description" rows="10"></textarea>
                    <label class="custom-label" for="task_status">Status</label>
                    <select class="custom-select" id="task_status">
                        <option class="backlog-option" value="1">Backlog</option>
                        <option class="to-do-option" value="2">To do</option>
                        <option class="doing-option" value="3">Doing</option>
                        <option class="done-option" value="4">Done</option>
                    </select>
                </div>`,
        focusConfirm: false,
        showDenyButton: true,
        confirmButtonText: 'Create',
        denyButtonText: 'Cancel',
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

async function editTask({ id, from }) {
    await Swal.fire({
        title: `Edit task ${id}`,
        html: ` <div class="edit-task-div">
                    <label class="custom-label" for="task_title">Title</label>
                    <input class="custom-input" id="task_title">
                    <label class="custom-label" for="task_description">Description</label>
                    <textarea class="custom-textarea" id="task_description" rows="10"></textarea>
                    <label class="custom-label" for="task_status">Status</label>
                    <select class="custom-select" id="task_status">
                        <option class="backlog-option" value="1">Backlog</option>
                        <option class="to-do-option" value="2">To do</option>
                        <option class="doing-option" value="3">Doing</option>
                        <option class="done-option" value="4">Done</option>
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
        title: `Are you shure you want to delete task ${id}?`,
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