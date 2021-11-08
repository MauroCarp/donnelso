// CAMPO OTRO MOTIVO
const mostrarOtroMotivo = (id,idOtro)=>{

    $(`#${id}`).on('change', evt => {
    
        let value = evt.target.value;
    
        if(value == 'Otro'){        
        
            $(`#${idOtro}`).show() 
            
        }else{
            
            $(`#${idOtro}`).hide() 
    
        }
        
    });

}

mostrarOtroMotivo('motivoMuerte','otroMotivoMuerte')

const motivosMuerte = ["Empaste","Parto","Neumonia","Diarrea","Otro"]

// EDITAR MUERTE
$(".tablaMuertes").on("click", ".btnEditarMuerte", function(){

    let idMuerte = $(this).attr('idmuerte')
    
    let data = `idMuerte=${idMuerte}`

    let url = 'ajax/muertes.ajax.php'
    
    $('#editarMotivoMuerte').html('')
    $('#editarOtroMotivo').hide()

    mostrarOtroMotivo('editarMotivoMuerte','editarOtroMotivo')
    
    $.ajax({
        method:'post',
        data,
        url,
        success:(response)=>{

            let respuesta = JSON.parse(response)            
            
            $('#editarIdMuerte').val(respuesta.id)
            $('#editarCaravanaMuerte').val(respuesta.caravana)
            $('#editarFechaMuerte').val(respuesta.fecha)
            
            $(`input[name="editarAnimal"]`).removeAttr("checked");
            $(`input[name="editarAnimal"][value="${respuesta.animal}"]`).attr("checked","checked");

            let opt = `<option value="${respuesta.motivo}">${respuesta.motivo}</option>`
            $('#editarMotivoMuerte').append(opt)
            

            motivosMuerte.map(motivo=>{
                
                if(motivo != respuesta.motivo){

                    opt = `<option value="${motivo}">${motivo}</option>`
                    $('#editarMotivoMuerte').append(opt)
                
                }

            })

        }
    })
})


// ELIMINAR MUERTE
$(".tablaMuertes").on("click", ".btnEliminarMuerte", function(){

    let id = $(this).attr('idmuerte')

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