
/*================ SIDEBAR-MENU ====================*/

$('.sidebar-menu').tree();



/*=============================================
              ESCONDER SLIDE
=============================================*/

/*==========================  AGREGAR INFORMACION DE SOLICITUD Y ARCO  ==============================*/

var toogle = true;
//var select = $('#Terminado');

/* --- SLIDE PARA MEDIOS DE PRESENTACION ---  */

$("#btnSlide").click(function(){

    if(!toogle){
  
      toogle = true;
  
      $("#slide").slideUp("fast");
  
      $("#btnSlide").html('<span> Medio de Presentación <i class="fa fa-angle-down"> </i> </span>')
    
    }else{
  
      toogle = false;
  
      $("#slide").slideDown("fast");
  
      $("#btnSlide").html(' <span> Medio de Presentación <i class="fa fa-angle-up"> </i> </span>')

    }
  
  })

/* --- SLIDE PARA TIPO DE SOLICITANTE ---  */

  $("#btnSlideTS").click(function(){

    if(!toogle){
  
      toogle = true;
  
      $("#SlideTS").slideUp("fast");
  
      $("#btnSlideTS").html('<span> Tipo de Solicitante <i class="fa fa-angle-down"> </i> </span>')
    
    }else{
  
      toogle = false;

      $("#SlideTS").slideDown("fast");
  
      $("#btnSlideTS").html(' <span> Tipo de Solicitante <i class="fa fa-angle-up"> </i> </span>')
    }
  
  })

  /* --- SLIDE PARA GENERO DEL SOLICITANTE ---  */

  $("#btnSlideGS").click(function(){

    if(!toogle){
  
      toogle = true;
  
      $("#SlideGS").slideUp("fast");
  
      $("#btnSlideGS").html('<span> Genero del Solicitante <i class="fa fa-angle-down"> </i> </span>')
    
    }else{
  
      toogle = false;

      $("#SlideGS").slideDown("fast");
  
      $("#btnSlideGS").html(' <span> Genero del Solicitante <i class="fa fa-angle-up"> </i> </span>')
    }
  
  })

    /* --- SLIDE PARA INFORMACIÓN SOLICITADA ---  */

    $("#btnSlideIS").click(function(){

      if(!toogle){
    
        toogle = true;
    
        $("#SlideIS").slideUp("fast");
    
        $("#btnSlideIS").html('<span> Informacion Solicitada <i class="fa fa-angle-down"> </i> </span>')
      
      }else{
    
        toogle = false;
  
        $("#SlideIS").slideDown("fast");
    
        $("#btnSlideIS").html(' <span> Informacion Solicitada <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })

    /* --- SLIDE PARA TRAMITES ---  */

    $("#btnSlideT").click(function(){

      if(!toogle){
    
        toogle = true;
    
        $("#SlideT").slideUp("fast");
    
        $("#btnSlideT").html('<span> Tramites <i class="fa fa-angle-down"> </i> </span>')
      
      }else{
    
        toogle = false;
  
        $("#SlideT").slideDown("fast");
    
        $("#btnSlideT").html(' <span> Tramites <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })

    /* --- SLIDE PARA MODALIDAD DE RESPUESTA ---  */

    $("#btnSlideMR").click(function(){

      if(!toogle){
    
        toogle = true;
    
        $("#SlideMR").slideUp("fast");
    
        $("#btnSlideMR").html('<span> Modalidad de Respuesta <i class="fa fa-angle-down"> </i> </span>')
      
      }else{
    
        toogle = false;
  
        $("#SlideMR").slideDown("fast");
    
        $("#btnSlideMR").html(' <span> Modalidad de Respuesta <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })

     /* --- SLIDE PARA OBLIGACIONES SOLICITADAS  ---  */ 

    $("#btnSlideOS").click(function(){

      if(!toogle){
    
        toogle = true;
    
        $("#SlideOS").slideUp("fast");
    
        $("#btnSlideOS").html('<span> Obligaciones Solicitadas <i class="fa fa-angle-down"> </i> </span>')
      
      }else{
    
        toogle = false;
  
        $("#SlideOS").slideDown("fast");
    
        $("#btnSlideOS").html(' <span> Obligaciones Solicitadas <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })

     /* --- SLIDE PARA SENTIDO EN QUE SE EMITE LA RESPUESTA ---  */ 

    $("#btnSlideSR").click(function(){

      if(!toogle){
    
        toogle = true;
    
        $("#SlideSR").slideUp("fast");
    
        $("#btnSlideSR").html('<span> Sentido en que se Emite la Respuesta <i class="fa fa-angle-down"> </i> </span>')
      
      }else{
    
        toogle = false;
  
        $("#SlideSR").slideDown("fast");
    
        $("#btnSlideSR").html(' <span> Sentido en que se Emite la Respuesta <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })


  /*==========================  ACTUALIZAR INFORMACION DE SOLICITUD Y ARCO  ==============================*/

/* --- SLIDE PARA MEDIOS DE PRESENTACION ---  */

$("#btnSlideMPE").click(function(){

  if(!toogle){

    toogle = true;

    $("#slideMPE").slideUp("fast");

    $("#btnSlideMPE").html('<span> Medio de Presentación <i class="fa fa-angle-down"> </i> </span>')
  
  }else{

    toogle = false;

    $("#slideMPE").slideDown("fast");

    $("#btnSlideMPE").html(' <span> Medio de Presentación <i class="fa fa-angle-up"> </i> </span>')

  }

})

/* --- SLIDE PARA TIPO DE SOLICITANTE ---  */

$("#btnSlideTSE").click(function(){

  if(!toogle){

    toogle = true;

    $("#SlideTSE").slideUp("fast");

    $("#btnSlideTSE").html('<span> Tipo de Solicitante <i class="fa fa-angle-down"> </i> </span>')
  
  }else{

    toogle = false;

    $("#SlideTSE").slideDown("fast");

    $("#btnSlideTSE").html(' <span> Tipo de Solicitante <i class="fa fa-angle-up"> </i> </span>')
  }

})

/* --- SLIDE PARA GENERO DEL SOLICITANTE ---  */

$("#btnSlideGSE").click(function(){

  if(!toogle){
  
      toogle = true;
  
      $("#SlideGSE").slideUp("fast");
  
      $("#btnSlideGSE").html('<span> Genero del Solicitante <i class="fa fa-angle-down"> </i> </span>')
    
  }else{
  
      toogle = false;

      $("#SlideGSE").slideDown("fast");
  
      $("#btnSlideGSE").html('<span> Genero del Solicitante <i class="fa fa-angle-up"> </i> </span>')
    }
  
  })

/* --- SLIDE PARA INFORMACIÓN SOLICITADA ---  */

 $("#btnSlideISE").click(function(){

    if(!toogle){
    
      toogle = true;
    
      $("#SlideISE").slideUp("fast");
    
      $("#btnSlideISE").html('<span> Informacion Solicitada <i class="fa fa-angle-down"> </i> </span>')
      
    }else{
    
      toogle = false;
  
      $("#SlideISE").slideDown("fast");
    
      $("#btnSlideIES").html(' <span> Informacion Solicitada <i class="fa fa-angle-up"> </i> </span>')

      }
    
    }) 
  
/* --- SLIDE PARA TRAMITES ---  */

$("#btnSlideTE").click(function(){

    if(!toogle){
    
      toogle = true;
    
      $("#SlideTE").slideUp("fast");
    
      $("#btnSlideTE").html('<span> Tramites <i class="fa fa-angle-down"> </i> </span>')
      
    }else{
    
      toogle = false;
  
      $("#SlideTE").slideDown("fast");
    
      $("#btnSlideTE").html(' <span> Tramites <i class="fa fa-angle-up"> </i> </span>')
      }
    
    })

/* --- SLIDE PARA MODALIDAD DE RESPUESTA ---  */

$("#btnSlideMRE").click(function(){

   if(!toogle){
    
      toogle = true;
    
      $("#SlideMRE").slideUp("fast");
    
      $("#btnSlideMRE").html('<span> Modalidad de Respuesta <i class="fa fa-angle-down"> </i> </span>')
      
  }else{
    
        toogle = false;
  
        $("#SlideMRE").slideDown("fast");
    
        $("#btnSlideMRE").html(' <span> Modalidad de Respuesta <i class="fa fa-angle-up"> </i> </span>')
      }
    
  })

/* --- SLIDE PARA OBLIGACIONES SOLICITADAS  ---  */ 

  $("#btnSlideOSE").click(function(){

    if(!toogle){
    
        toogle = true;
    
        $("#SlideOSE").slideUp("fast");
    
        $("#btnSlideOSE").html('<span> Obligaciones Solicitadas <i class="fa fa-angle-down"> </i> </span>')
      
    }else{
    
        toogle = false;
  
        $("#SlideOSE").slideDown("fast");
    
        $("#btnSlideOSE").html(' <span> Obligaciones Solicitadas <i class="fa fa-angle-up"> </i> </span>')

      }
    
  })

/* --- SLIDE PARA SENTIDO EN QUE SE EMITE LA RESPUESTA ---  */ 

  $("#btnSlideSRE").click(function(){

    if(!toogle){
    
      toogle = true;
    
      $("#SlideSRE").slideUp("fast");
    
      $("#btnSlideSRE").html('<span> Sentido en que se Emite la Respuesta <i class="fa fa-angle-down"> </i> </span>')
      
    }else{
    
      toogle = false;
  
      $("#SlideSRE").slideDown("fast");
    
      $("#btnSlideSRE").html(' <span> Sentido en que se Emite la Respuesta <i class="fa fa-angle-up"> </i> </span>')
      
    }
    
    })


    /*==========================  AGREGAR INFORMACION DE CAPACITACIONES  ==============================*/

    /* --- SLIDE PARA MEDIOS DE PRESENTACION ---  */

  $("#btnSlideCapacitacion").click(function(){

  if(!toogle){

    toogle = true;

    $("#slideCapacitacion").slideUp("fast");

    $("#btnSlideCapacitacion").html('<span> Capacitaciones <i class="fa fa-angle-down"> </i> </span>')
  
  }else{

    toogle = false;

    $("#slideCapacitacion").slideDown("fast");

    $("#btnSlideCapacitacion").html(' <span> Capacitaciones <i class="fa fa-angle-up"> </i> </span>')

   }

  })

   /* --- SLIDE PARA MEDIOS DE PRESENTACION ---  */

  $("#btnSlideCapacitacionA").click(function(){

    if(!toogle){
  
      toogle = true;
  
      $("#slideCapacitacionA").slideUp("fast");
  
      $("#btnSlideCapacitacionA").html('<span> Capacitaciones <i class="fa fa-angle-down"> </i> </span>')
    
    }else{
  
      toogle = false;
  
      $("#slideCapacitacionA").slideDown("fast");
  
      $("#btnSlideCapacitacionA").html(' <span> Capacitaciones <i class="fa fa-angle-up"> </i> </span>')
  
     }
  
    })