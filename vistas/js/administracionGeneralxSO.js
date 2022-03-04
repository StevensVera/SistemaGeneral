/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var perfilOcultoUsuarioxSO = $("#perfilOcultoUsuarioxSO").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigoxSO = $("#perfiCodigoxSO").val();


$(".tablasAdministracionSujetosObligadosGeneral tbody").on('click', '.btnImprimerReporteAdministaciónSO', function() {

var idAdminstracionSOSI = $(this).attr("idAdminstracionSOSI");

var idAdminstracionSOSA = $(this).attr("idAdminstracionSOSA");

var idAdminstracionSOCA = $(this).attr("idAdminstracionSOCA");

//console.log("perfiCodigo", perfiCodigo);

var table = $(".tablasAdministracionSujetosObligadosGeneralxSO").DataTable({
    
    "ajax":"ajax/datable-adjuntosAdministracionSOGeneralxSO.ajax.php?&idSI="+idAdminstracionSOSI+"&idSAR="+idAdminstracionSOSA+"&idCA="+idAdminstracionSOCA+"&perfilOcultoUsuarioxSO="+perfilOcultoUsuarioxSO+"&perfiCodigoxSO"+perfiCodigoxSO,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "scrollY": 300,
    "scrollX": true,

    initComplete: function () {
        this.api().columns([1, 2, 3, 4]).every( function () {
            var column = this;
            var select = $('<select style="width:20px"><option value=""></option></select>')
                .appendTo( $(column.footer()).empty() )
                .on( 'change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );
  
                    column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                } );
  
            column.data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
        } );
    },
       
     "language": {
  
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      },  
  
    }
  
  });

});


 



/*
  $('#nuevoAnioAdministracionSO').on( 'keyup', function () {

    table.search( this.value ).draw();

} );

*/

/*
var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

//console.log("perfilOcultoUsuario", perfilOcultoUsuario);

var perfiCodigo = $("#perfiCodigo").val();

$(document).ready(function() {

    // Setup - add a text input to each footer cell

    $('#example tfoot th').each( function () {

        var title = $(this).text();

        $(this).html( '<input type="text" placeholder="'+title+'" />' );

    } );

        // DataTable
        var table = $('#example').DataTable({

            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
     
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });

} );    
*/