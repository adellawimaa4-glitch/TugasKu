// // DataTable + Export Excel / PDF
// $(document).ready(function() {

//     // ⬇⬇⬇ TAMBAHKAN BLOK INI
//     // Kalau #dataTable sudah pernah jadi DataTable, hancurkan dulu
//     if ($.fn.dataTable.isDataTable('#dataTable')) {
//         $('#dataTable').DataTable().clear().destroy();
//     }
//     // ⬆⬆⬆ SAMPAI SINI

//     var table = $('#dataTable').DataTable({
//         destroy: true,          // opsional, tapi aman kalau kepanggil lagi
//         dom: 'Bfrtip', // B = Buttons
//         buttons: [
//             {
//                 extend: 'excelHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none' // tombol bawaan disembunyikan
//             },
//             {
//                 extend: 'pdfHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none', // tombol bawaan disembunyikan
//                 orientation: 'portrait',
//                 pageSize: 'A4'
//             }
//         ]
//     });

//     // Tombol hijau Excel di header
//     $('#btnExcel').on('click', function() {
//         table.button(0).trigger(); // trigger tombol export Excel
//     });

//     // Tombol merah PDF di header
//     $('#btnPdf').on('click', function() {
//         table.button(1).trigger(); // trigger tombol export PDF
//     });
// });
// DataTable + Export Excel / PDF
// $(document).ready(function() {
//     var table = $('#dataTable').DataTable({
//         dom: 'Bfrtip', // B = Buttons
//         buttons: [
//             {
//                 extend: 'excelHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none' // tombol bawaan disembunyikan
//             },
//             {
//                 extend: 'pdfHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none', // tombol bawaan disembunyikan
//                 orientation: 'portrait',
//                 pageSize: 'A4'
//             }
//         ]
//     });

//     $('#btnExcel').on('click', function() {
//         table.button(0).trigger();
//     });

//     $('#btnPdf').on('click', function() {
//         table.button(1).trigger();
//     });
// });
// DataTable + Export Excel / PDF
// $(document).ready(function() {

//     // Jika #dataTable sudah jadi DataTable, hancurkan instance-nya
//     if ($.fn.dataTable.isDataTable('#dataTable')) {
//         $('#dataTable').DataTable().destroy();   // ⬅ Hanya destroy, NO clear() !!!
//     }

//     var table = $('#dataTable').DataTable({
//         destroy: true, 
//         dom: 'Bfrtip',
//         buttons: [
//             {
//                 extend: 'excelHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none'
//             },
//             {
//                 extend: 'pdfHtml5',
//                 title: 'Rekap Data User',
//                 className: 'd-none',
//                 orientation: 'portrait',
//                 pageSize: 'A4'
//             }
//         ]
//     });

//     $('#btnExcel').on('click', function() {
//         table.button(0).trigger();
//     });

//     $('#btnPdf').on('click', function() {
//         table.button(1).trigger();
//     });
// });
// DataTable + Export Excel / PDF
$(document).ready(function() {

    if ($.fn.dataTable.isDataTable('#dataTable')) {
        $('#dataTable').DataTable().destroy();
    }

    // ambil judul export dari atribut data-title pada table
    var exportTitle = $('#dataTable').data('title') || 'Rekap Data';

    var table = $('#dataTable').DataTable({
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: exportTitle,      // <-- pakai judul dinamis
                className: 'd-none'
            },
            {
                extend: 'pdfHtml5',
                title: exportTitle,      // <-- pakai judul dinamis
                className: 'd-none',
                orientation: 'portrait',
                pageSize: 'A4'
            }
        ]
    });

    $('#btnExcel').on('click', function() {
        table.button(0).trigger();
    });

    $('#btnPdf').on('click', function() {
        table.button(1).trigger();
    });
});
