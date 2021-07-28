
/*================ SIDEBAR-MENU ====================*/

$('.sidebar-menu').tree();



/*=============================================
ESCONDER SLIDE
=============================================*/

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


