
const cargarPrecioCajas = ()=>{


	let url = 'ajax/precios.ajax.php';

	let data = `accion=cargarPrecios`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){
            
            let respuesta = JSON.parse(response)

            $('#precioKgCerdo').html(respuesta.cerdo)
            $('#precioKgChivo').html(respuesta.chivo)
            $('#precioKgCordero').html(respuesta.cordero)
            $('#precioKgPollo').html(respuesta.pollo)
            $('#precioKgVaca').html(respuesta.vaca)
            $('#precioKgSalame').html(respuesta.salame)
            $('#precioKgChorizo').html(respuesta.chorizo)
            $('#precioKgMorcilla').html(respuesta.morcilla)
            $('#precioKgBondiola').html(respuesta.bondiola)
            $('#precioKgJamon').html(respuesta.jamon)
            $('#precioKgCodeguin').html(respuesta.codeguines)
            $('#precioKgGrasa').html(respuesta.grasa)
            $('#precioKgChicharron').html(respuesta.chicharron)
            $('#precioKgCarne').html(respuesta.carne)
        
        }

    })

}

const cargarCantidadCajas = ()=>{


	let url = 'ajax/precios.ajax.php';

	let data = `accion=cargarCantidad`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){
            console.log('hola');
            
            // let respuesta = JSON.parse(response)

            $('#cantidadCerdo').html(10)
            $('#cantidadChivo').html(10)
            $('#cantidadCordero').html(10)
            $('#cantidadPollo').html(10)
            $('#cantidadVaca').html(10)
        
        }

    })

}

let pathname = window.location.pathname.split('/');

if(pathname.find(element => element == 'inicio')){
   
    cargarPrecioCajas();
    
    cargarCantidadCajas();

}    

