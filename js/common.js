function viewTask({ id, from }) {
    console.log(id);
}

function editTask({ id, from }) {
    console.log(id);
}

function deleteTask({ id, from }) {
    Swal.fire({
        title: `Are you shure you want to delete task ${id}?`,
        icon: 'warning',
        showDenyButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: 'Cancel',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire('Saved!', '', 'success')
        } else if (result.isDenied) {
            Swal.fire('Changes are not saved', '', 'info')
        }
    })
}