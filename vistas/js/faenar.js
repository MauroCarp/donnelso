$("input[name='animalFaenar']").on('change',function(){

    let value = $(this).val();
    
    if(value == 'pollo'){

        $('#cantidadFaenarPolloInput').show();
        $('#caravanaFaenarInput').hide();
    }else{
        
        $('#cantidadFaenarPolloInput').hide();
        $('#caravanaFaenarInput').show();

    }

})

$('#motivoMuerte').on('change', evt => {

    let value = evt.target.value;

    (value === 'Otro')
        $('#otroMotivoMuerte').toggle() 
  
    
});


$('#faenaPropio').on('click',(evt)=>{

    let value = evt.target.value;
    
    (value === 'off')
        $('#inputCaravanaFaenar').toggle();

});