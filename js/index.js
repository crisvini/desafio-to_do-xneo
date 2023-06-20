$(document).ready(function () {
    var backlog = document.getElementById('backlog');
    var to_do = document.getElementById('to_do');
    var doing = document.getElementById('doing');
    var done = document.getElementById('done');

    var sortable1 = Sortable.create(backlog, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 1');
        }
    });

    var sortable2 = Sortable.create(to_do, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 1');
        }
    });

    var sortable3 = Sortable.create(doing, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 2');
        }
    });

    var sortable4 = Sortable.create(done, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 3');
        }
    });
});
