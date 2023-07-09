$(document).ready(function () {
    let table = new DataTable('#myTable', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ru.json',
        },
    });
    let categoryTable = new DataTable('#categoryTable', {
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ru.json',
        },
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false,
    })

   
});
