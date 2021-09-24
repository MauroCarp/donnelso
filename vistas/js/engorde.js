
$('.tablas').on('click','.checkboxEngorde',function(){

    let node = $(this)[0];
    
    let previousNode = node
                        .parentNode
                        .previousSibling
                        .previousSibling;
    
    ( $(this).is(':checked') ) ? previousNode.textContent = 'Listo p/Venta' : previousNode.textContent = 'Engorde';

});

$('#produccionChazinados').on('click',()=>{

    $('#divProduccion').toggle();
    
});
