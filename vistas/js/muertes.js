// CAMPO OTRO PROVEEDOR

$('#motivoMuerte').on('change', evt => {

    let value = evt.target.value;

    (value === 'Otro')
        $('#otroMotivoMuerte').toggle() 
  
    
});