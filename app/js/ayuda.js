$('#resumenA').click(function(){
	
	
	$("#usuariosC").hide();
	$("#empleadosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();

	$("#resumenC").show();

});


$('#mapacontenidoA').click(function(){
	
	$("#usuariosC").hide();
	$("#empleadosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").show();
	$("#resumenC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});



$('#usuariosA').click(function(){
	
	$("#resumenC").hide();
	$("#empleadosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#usuariosC").show();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();

});

$('#empleadosA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").show();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#empleadosA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").show();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#comprasA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").show();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#cuentasCA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").show();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#cuentasPA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").show();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#EstadisticaA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").show();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#InventarioA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").show();
	$("#ventasC").hide();
	$("#pagosC").hide();
	
});

$('#ventasA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").show();
	$("#pagosC").hide();
	
});

$('#pagosA').click(function(){
	
	$("#resumenC").hide();
	$("#usuariosC").hide();
    $("#comprasC").hide();
	$("#mapacontenidoC").hide();
	$("#empleadosC").hide();
	$("#cuentasCc").hide();
	$("#cuentasPC").hide();
	$("#EstadisticaC").hide();
	$("#InventarioC").hide();
	$("#ventasC").hide();
	$("#pagosC").show();
	
});

 var nW,nH,oH,oW;
  function zoomToggle(iWideSmall,iHighSmall,iWideLarge,iHighLarge,whichImage){
    oW=whichImage.style.width;oH=whichImage.style.height;
    if((oW==iWideLarge)||(oH==iHighLarge)){
      nW=iWideSmall;nH=iHighSmall;
    }else{
      nW=iWideLarge;nH=iHighLarge;
    }
    whichImage.style.width=nW;whichImage.style.height=nH;
  }


  $('#tabla1').DataTable( {

    language: {

        search: "Buscar",
       
    },
   
} );