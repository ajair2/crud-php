let tabla

function init() {

}

$(document).ready(function(){
  tabla=$('#producto-data').dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
    },
    
    // Consultar los datos a la API
    ajax:{
      url: '../../controllers/ProductoController.php?op=listar',
      type : "get",
      dataType : "json",
      error: function(e){
        console.log(e.responseText);	
      }
    },
    // ocultar columnas
    columnDefs:[
      {
        targets: [0],
        visible: true,
        searchable: false,
      }
    ],

    // mostrar botones de exportación
    dom: "<'top'Bf>rt<'bottom'lpi><'clear'>",
    buttons: [
      {
        extend: "copyHtml5",
        text: "<i class='bi bi-clipboard'></i>",
        titleAttr: "Copiar",
        className: "btn btn-secondary"
      },
      {
        extend: "excelHtml5",
        text: "<i class='bi bi-file-earmark-excel'></i>",
        titleAttr: "Exportar a Excel",
        className: "btn btn-success"
      },
      {
        extend: "pdfHtml5",
        text: "<i class='bi bi-file-earmark-pdf-fill'></i>",
        titleAttr: "Exportar a PDF",
        className: "btn btn-danger"
      },
      {
        extend: "csvHtml5",
        text: "<i class='bi bi-file-spreadsheet'></i>",
        titleAttr: "Exportar a CSV",
        className: "btn btn-warning"
      }
    ],

    lengthMenu: [
      [5, 10, 20, 50, -1],
      [5, 10, 20, 50, "All"],      
    ],
    iDisplayLength: 5,
    order: [[0, 'desc']]
    //
  }).DataTable();
});


init()