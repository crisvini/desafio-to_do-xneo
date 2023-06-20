$(document).ready(function () {
    var list1 = document.getElementById('list1');
    var list2 = document.getElementById('list2');

    var sortable1 = Sortable.create(list1, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 1');
        }
    });

    var sortable2 = Sortable.create(list2, {
        group: 'shared-list',
        animation: 150,
        onAdd: function (evt) {
            console.log('Item movido para a lista 2');
        }
    });
});
