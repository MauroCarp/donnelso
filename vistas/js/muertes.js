// CAMPO OTRO PROVEEDOR

$('#motivoMuerte').on('change', evt => {

    let value = evt.target.value;

    if(value == 'Otro'){        
    
        $('#otroMotivoMuerte').show() 
        
    }else{
        
        $('#otroMotivoMuerte').hide() 

    }
    
});

// ELIMINAR MUERTE
$(".tablaMuertes").on("click", ".btnEliminarMuerte", (evt)=>{

    let id = evt.target.attributes.idmuerte.nodeValue;

    new swal({
        title: '¿Está seguro de borrar el Registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registro!'
    }).then(function(result){
    
        if(result.value){
    
        window.location = `index.php?ruta=muertes&idMuerte=${id}`;
    
        }
    
    })
    
});

// CARAGAR SELECT
$('input[name="animalMuerte"]').on('change',function(){

    let tipo = $(this).val();

    cargarCaravanaBuscar(tipo,'caravanaMuerte')
    
})

$(()=>{

    cargarCaravanaBuscar('cerdo','caravanaMuerte')

})