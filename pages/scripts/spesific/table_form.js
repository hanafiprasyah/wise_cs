$(function() {
    $("#projectTable").DataTable({
        "ordering": true,
        "order": [[ 4, "desc" ]],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#projectTable_wrapper .col-md-6:eq(0)');
});
$(function() {
    $("#mainReq").DataTable({
        "ordering": true,
        "order": [[ 4, "desc" ]],
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#mainReq_wrapper .col-md-6:eq(0)');
});
$(function() {
    $("#withButton").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#withButton_wrapper .col-md-6:eq(0)');
});
$(function() {
    $("#withButtonB").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#withButtonB_wrapper .col-md-6:eq(0)');
});
$(function() {
    $("#withButtonC").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#withButtonC_wrapper .col-md-6:eq(0)');
});
$(function() {
    $("#withoutButton").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "searching": true
    }).buttons().container().appendTo('#withoutButton_wrapper .col-md-6:eq(0)');
});

// ============================================================ HERE THE DEFAULT ============================================================
// $(function() {
//     $(document).on('click', '[data-toggle="lightbox"]', function(event) {
//         event.preventDefault();
//         $(this).ekkoLightbox({
//             alwaysShowClose: true
//         });
//     });

//     $('.filter-container').filterizr({
//         gutterPixels: 3
//     });
//     $('.btn[data-filter]').on('click', function() {
//         $('.btn[data-filter]').removeClass('active');
//         $(this).addClass('active');
//     });
// });
// $(function() {
//     $("#quotes_table").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//     }).buttons().container().appendTo('#quotes_table_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#clientTable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#clientTable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#proposaltable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#proposaltable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#proposalAlltable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#proposalAlltable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#presentationtable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#presentationtable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#presentationAllTable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#presentationAllTable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#surveytable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#surveytable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#surveyAllTable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#surveyAllTable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#quotationtable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#quotationtable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#quotationAlltable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#quotationAlltable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#poAllTable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#poAllTable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#poTable").DataTable({
//         "responsive": true,
//         "lengthChange": false,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#poTable_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#scheduledVisitTableA").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#scheduledVisitTableA_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#scheduledVisitTableB").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#scheduledVisitTableB_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#scheduledVisitTableC").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#scheduledVisitTableC_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#warrantyTableA").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#warrantyTableA_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#warrantyTableB").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#warrantyTableB_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#warrantyTableC").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true
//     }).buttons().container().appendTo('#warrantyTableC_wrapper .col-md-6:eq(0)');
// });
// $(function() {
//     $("#monitoringTable").DataTable({
//         "responsive": true,
//         "lengthChange": true,
//         "autoWidth": false,
//         "searching": true,
//         "buttons": ["excel", "pdf", "print"]
//     }).buttons().container().appendTo('#monitoringTable_wrapper .col-md-6:eq(0)');
// });