let tabla

function init() {
  $("#producto-form").on("submit", function(e) {
    guardaryeditar(e)
  })

}

$(document).ready(function(){
  $.post("../../controllers/CategoriaController.php?op=combo", function(data) {
    $("#cat_id").html(data)
    console.log(data)
  })

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
  }).DataTable()
})

function guardaryeditar(e) {
  // Prevenir que se de doble click en boton guardar
  e.preventDefault()

  let formData = new FormData($("#producto-form")[0])

  $.ajax({
    url: "../../controllers/ProductoController.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function(datos){
      console.log(datos);
      $('#producto-form')[0].reset();
      $("#mantenimientoModal").modal('hide');
      $('#producto-data').DataTable().ajax.reload();

      swal.fire(
          'Registro!',
          'El registro correctamente.',
          'success'
      )
    }
  })
}

function editar(prod_id) {
  
  $("#mdlTitulo").html("Editar Registro")

  $.post("../../controllers/ProductoController.php?op=mostrar", {prod_id:prod_id}, function (data) {
    data = JSON.parse(data)
    $("#prod_id").val(data.prod_id)
    $("#cat_id").val(data.cat_id).trigger('change')
    $("#prod_name").val(data.prod_name)
    $("#prod_desc").val(data.prod_desc)
    $("#prod_cantidad").val(data.prod_cantidad)

  })

  $("#mantenimientoModal").modal("show")

}

function eliminar(prod_id) {
  Swal.fire({
    title: 'CRUD',
    text: "Está seguro de Eliminar el producto?",
    icon: 'error',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: "No",
    confirmButtonText: 'Sí'
  }).then((result) => {
    if (result.isConfirmed) {
      // console.log(prod_id)
      $.post("../../controllers/ProductoController.php?op=eliminar", {prod_id:prod_id}, function (data) {
        $('#producto-data').DataTable().ajax.reload()

      })

      Swal.fire(
        'Eliminado!',
        'El producto ha sido eliminado correctamente.',
        'success'
      )
    }
  })

}

$(document).on("click", "#btn-nuevo", function() {
  $("#mdlTitulo").html("Nuevo Registro")
  $("#producto-form")[0].reset()
  $("#prod_id").val("")
  $("#cat_id").val("").trigger('change')
  $("#mantenimientoModal").modal("show")
})

init()