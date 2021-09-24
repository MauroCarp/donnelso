$("#propioChazinado").on('change',()=>{

    let checkboxPropio = document.getElementById('propioChazinado');

    if (!checkboxPropio.checked){

        $('#caravanaChazinadoInput').hide();
        $('#inputPrecioKgVivo').show();
        
    } else {
        
        $('#caravanaChazinadoInput').show();
        $('#inputPrecioKgVivo').hide();

    }


})


const propsChazinados = {
    campo: 'caravanaChazinados',
    numero: 1,
    idInput: 'agregarCaravanaChazinado',
    nombreIdInput: 'caravanaChazinado',
    textContent: 'N° Caravana',
    rowId: 'rowCaravana',
}

$('#agregarCaravanaChazinado').on('click',()=>{
    

    $('#caravanaChazinadoInput').append(generarInputCaravanas(propsChazinados));

    propsChazinados.numero += 1;

});
