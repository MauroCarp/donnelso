const cargarDatosStock = ()=>{

    const url = 'ajax/stock.ajax.php';

    const data = 'accion=mostrarDatos';

    $.ajax({
        method: 'post',
        url:url,
        data:data,
        success:function(response){
            
            const respuesta = JSON.parse(response);

            respuesta.map((insumo)=>{

                const nombreInsumo = insumo.insumo.replace(' ','');
                     
                $(`#kg${nombreInsumo}`).val(insumo.kilos)
                $(`#precio${nombreInsumo}`).val(insumo.precio)
                
            })

        }
    })

}

$('#agregarStock').on('click',(evt)=>{

    evt.preventDefault();

    const url = 'ajax/stock.ajax.php';

    const insumo = $('#insumoStock').val();

    const kilos = $('#kgStock').val();

    const precio = $('#precioStock').val();
 
    const data = `accion=actualizarStock&insumo=${insumo}&kilos=${kilos}&precio=${precio}`;
    
    $.ajax({

        method:'post',
        url: url,
        data:data,
        success:function(response){    
            console.log(response);
            
            if(response == 'CampoVacio'){

                new swal({
    
                    icon: "error",
                    title: "¡Hay campos que no pueden ir vacíos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
        
                });
    
            }

            if(response == 'ok'){

                new swal({

                    icon: "success",
                    title: "El stock ha sido actualizado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                });

                let insumoParse = insumo.replace(' ','');

                let valor = parseInt($(`#kg${insumoParse}`).val());
                
                $(`#kg${insumoParse}`).val(valor + parseInt(kilos));

                $(`#precio${insumoParse}`).val(precio);
                

            }

            if(response == 'error'){

                new swal({

                    icon: "error",
                    title: "Hubo un error al actualizar. Notificar a Mauro",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
    
                });

            }

        }

    });

});

$('#animalRacion').on('change',(evt)=>{

    let value = evt.target.value;

    if(value != ''){
        
        $('#formulaRacion').removeAttr('disabled');
        
    }else{
        
        $('#formulaRacion').attr('disabled','disabled');

    }

    let data = `animal=${value}`;

    let url = 'ajax/consumo.ajax.php';
    
    $('#formulaRacion').html('');
    
    $.ajax({
        method:'post',
        url,
        data,
        success:function(response){
            
            let respuesta = JSON.parse(response);

            respuesta.map(formula=>{

                $('#formulaRacion').append(`<option value='${formula.nombre}'>${formula.nombre}</option>`)

            })            

            
        }
    })
});

$('.tablaRaciones').on('click','.btnEliminarRacion',function(){

    let id = $(this).attr('idRacion');

    new swal({
        title: '¿Está seguro de borrar el Registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, borrar el registro!'
      }).then(function(result){
    
        if(result.value){
    
          window.location = `index.php?ruta=consumo&idRacion=${id}`;
    
        }
    
      })

});


$(document).ready(()=>{
    
    generarSelectInsumos('insumoStock');

    cargarDatosStock();

});

