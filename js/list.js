$(document).ready(function () {
    $('#task_table').DataTable({
        "lengthChange": false,
        "pageLength": 15,
        "pagingType": "full_numbers",
        "info": false
    });
});