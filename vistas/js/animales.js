$('#editarAnimal').on('click',(evt)=>{

    evt.preventDefault()

    data = {

        idAnimal:$('#idAnimalBuscada').val(),
        caravana:$('#caravanaBuscada').val(),
        edad:$('#edadBuscada').val(),
        sexo:$('input[name="sexoBuscada"]:checked').val(),
        proveedor:$('#proveedorBuscar').val(),
        fecha:$('#fechaCompraBuscada').val(),
        peso:$('#pesoBuscada').val(),
        destino:$('#destinoBuscar').val(),
        estado:$('#estadoBuscar').val(),
        complicacion:$('#complicacionBuscar').val()

    }

    if(data.destino == 'Engorde'){

      let listo = ($('input:checkbox[name="listoVentaBuscar"]:checked').val() == 'on') ? 1 : 0

        data.listoVenta = listo 

    }
    
    data = JSON.stringify(data);

    new swal({
        title: '¿Editar Animal?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, Editar animal!'
      }).then(function(result){
    
        if(result.value){
    
          window.location = `index.php?ruta=inicio&editarAnimal=true&data=${data}`;
    
        }
    
    })

})