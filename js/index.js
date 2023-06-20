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