$(document).ready( function () {

    console.log("js works, kind of");
    $('#myTable').DataTable( {
        responsive: true,
        "lengthMenu": [[8, 15, 30, -1], [8, 15, 30, "All"]]
    });

    $('#assigned').DataTable( {
        responsive: true,
        "lengthMenu": [[8, 15, 30, -1], [8, 15, 30, "All"]]
    });

    $('#closed').DataTable( {
        responsive: true,
        "lengthMenu": [[8, 15, 30, -1], [8, 15, 30, "All"]]
    });

    // $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

    // // $($.fn.dataTable.tables(true)).DataTable()
    // //     .columns.adjust()
    // //     .responsive.recalc();
    // // });

});

