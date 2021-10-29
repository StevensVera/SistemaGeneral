
var perfilOcultoUsuario = $("#perfilOcultoUsuario").val();

console.log("perfilOcultoUsuario", perfilOcultoUsuario);


/* ============== MOSTRAR DATOS DE USUARIOS EN EL DATATABLE ================ */

var table = $(".tablasUsuariosSO").DataTable({
   
    "ajax":"ajax/datatable-adjuntosUsuarios.ajax.php?perfilOcultoUsuario="+perfilOcultoUsuario,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
     "scrollY": 450,
     "scrollX": true,
       
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

  $(".tablasUsuariosSO tbody").on('click', '.btnImprimerReportexUsuario', function() {

    var idUsuario = $(this).attr("idAdjuntosUsuarios");

    window.open("extensiones/tcpdf/pdf/reporteUsuario.php?id="+idUsuario,"_blank");
    
  });

  /* =========================== ACTIVAR ESTADO DEL USUARIO ==================== */

  $(".tablasUsuariosSO").on("click", ".btnActivar", function() {

    var idUsuario = $(this).attr("idUsuario");

    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();

    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    //console.log("activarId",idUsuario);
  	//console.log("activarUsuario",estadoUsuario);

    $.ajax({

      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data:datos,
      cache:false,
      contentType:false,
      processData: false,
      success: function (respuesta) {

        //console.log("respuesta", respuesta);
        
	        if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
                    title: "El usuario ha sido actualizado",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"

                  }).then(function(result) {
                      if (result.value) {

                        window.location = "usuarios";

                      }
				});

	      	}
        
       } // End Success
       
    }) // End Ajax

    if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

    
  }) // End Function

  /* ============== MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR ================ */ 

  $(".tablasUsuariosSO").on("click", ".btnEditarAdjuntosUsuarios", function() {
  
    var idAdjuntosUsuarios = $(this).attr("idAdjuntosUsuarios");

    console.log("idAdjuntosUsuarios",idAdjuntosUsuarios);

    var datos = new FormData();

    datos.append("idAdjuntosUsuarios", idAdjuntosUsuarios);

    $.ajax({
      url:"ajax/adjuntosUsuarios.ajax.php",
      method: "POST",  
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta) {

        console.log("respuesta", respuesta);

        $("#editarCodigoSO").val(respuesta["codigo"]);
        $("#editarTipoSO").html(respuesta["tipo_so"]);
        $("#editarTipoSO").val(respuesta["tipo_so"]);
        $("#editarNombreSO").val(respuesta["nombre_Informe"]);
        $("#editarNombreUT").val(respuesta["titular_Informe"]);
        $("#editarUsuarioUT").val(respuesta["usuario_Informe"]);
        //$("#editarPassword").val(respuesta["password_Informe"]);
        $("#passwordActual").val(respuesta["password_Informe"]);
        $("#editarPerfil").html(respuesta["perfil_Informe"]);
        $("#editarPerfil").val(respuesta["perfil_Informe"]);
        $("#fotoActual").val(respuesta["foto_Informe"]);
        $("#archivoActual").val(respuesta["archivo_Informe"]);



        if (respuesta["foto_Informe"] != "") {
          
          $(".previsualizarEditar").attr("src", respuesta["foto_Informe"]);

        }else{

          $(".previsualizarEditar").attr("src", "vistas/img/usuarios/default/anonymous.png");
  
        }

        if (respuesta["archivo_Informe"] != "") {
          
          $(".nuevoArchivo").attr("src", respuesta["archivo_Informe"]);

        }        
        
      }

    })

  }) // EVENTO MOSTRAR LOS DATOS DE USUARIOS HA ACTUALIZAR
  

/* =================== ELIMINAR USUARIO ==================== */

$(".tablasUsuariosSO").on("click", ".btnEliminarUsuario", function () {
 
  var idUsuario = $(this).attr("idUsuario");

  var codigo = $(this).attr("codigo");

  var usuario = $(this).attr("usuario");

  var fotoUsuario = $(this).attr("fotoUsuario");
  

  swal({

    title: '¿Esta seguro de borrar el usuario?',
    text: "¡Si no lo esta puede cancelar la accion",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText:'Cancelar',
    confirmButtonText:'Si, borrar Usuario!'
   }).then((result)=>{

    if(result.value){

      window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&codigo="+codigo+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;

     }

   })  
})

/* =================== SUBIR FOTO USUARIO ==================== */
$(".nuevaFoto").change(function(){

  var imagen = this.files[0];

  console.log("imagen",imagen);

  /* === VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG === */

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFoto").val("");

      swal({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  } else if(imagen["size"] > 2097152){

    $(".nuevaFoto").val("");

    swal({
       title: "Error al subir la imagen",
       text: "¡La imagen no debe pesar más de 2MB!",
       type: "error",
       confirmButtonText: "¡Cerrar!"
     });

  }else{

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){

        var rutaImgen = event.target.result;

        $(".previsualizar").attr("src", rutaImgen);
      
    })


  } 

})

/* =================== ACTUALIZAR FOTO USUARIO ==================== */
$(".nuevaFotoEditar").change(function(){

  var imagen = this.files[0];

  console.log("imagen",imagen);

  /* === VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG === */

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".nuevaFotoEditar").val("");

      swal({
        title: "Error al subir la imagen",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

  } else if(imagen["size"] > 2097152){

    $(".nuevaFotoEditar").val("");

    swal({
       title: "Error al subir la imagen",
       text: "¡La imagen no debe pesar más de 2MB!",
       type: "error",
       confirmButtonText: "¡Cerrar!"
     });

  }else{

    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){

        var rutaImgen = event.target.result;

        $(".previsualizarEditar").attr("src", rutaImgen);
      
    })


  } 

})

/* =================== SUBIR ARCHIVO USUARIO ==================== */

$(".nuevoArchivo").change(function() {

    var archivo = this.files[0];

    console.log("archivo",archivo);

      /* === VALIDAMOS EL FORMATO DEL ARCHIVO SEA EN PDF === */

    if(archivo["type"] != "application/pdf"){

      $(".nuevoArchivo").val("");

      swal({
        title: "Error al subir el archivo",
        text: "¡La archivo debe estar en formato PDF!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
      });

    } else if(archivo["size"] > 20971520 ){
   
      swal({
        title: "Error al subir el archivo",
        text: "¡El archivo no debe pesar más de 20MB!",
         type: "error",
         confirmButtonText: "¡Cerrar!"
       });


    }
  
})

/* =================== REVISAR SI EL CODIGO DE S.O ESTA REPETIDO ==================== */

$("#nuevoCodigoSO").change(function() {

  $(".alert").remove();

  var Codigo = $(this).val();

  var datos = new FormData();

  datos.append("validarCodigo", Codigo);
 
    $.ajax({
      url:"ajax/usuarios.ajax.php",
      method:"POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){
        
        if(respuesta){

          $("#nuevoCodigoSO").parent().after('<div class="alert alert-warning">Codigo ya Existente</div>');

          $("#nuevoCodigoSO").val("");

        }

      }

  })
  
})







