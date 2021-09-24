const cargarPrecios = ()=>{

    let data = 'accion=cargarPrecios';

    let url = 'ajax/precios.ajax.php';

    $.ajax({
        method:'post',
        data,
        url,
        success:function(response){

            let respuesta = JSON.parse(response);

            $('#idPrecio').val(respuesta.id)
            $('#precioCerdo').val(respuesta.cerdo)
            $('#precioCordero').val(respuesta.cordero)
            $('#precioChivo').val(respuesta.chivo)
            $('#precioPollo').val(respuesta.pollo)
            $('#precioVaca').val(respuesta.vaca)
            $('#precioChorizo').val(respuesta.chorizo)
            $('#precioMorcilla').val(respuesta.morcilla)
            $('#precioSalames').val(respuesta.salame)
            $('#precioBondiola').val(respuesta.bondiola)
            $('#precioJamon').val(respuesta.jamon)
            $('#precioGrasa').val(respuesta.grasa)
            $('#precioCodeguines').val(respuesta.codeguines)
            $('#precioChicharron').val(respuesta.chicharron)
            $('#precioCarne').val(respuesta.carne)
            $('#comisionEmpleado').val(respuesta.comisionEmpleado)

        }

    });

}

$(()=>{

    cargarPrecios();

})