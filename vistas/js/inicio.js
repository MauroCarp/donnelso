
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

const cargarStockCajas = ()=>{


	let url = 'ajax/precios.ajax.php';

	let data = `accion=cargarStock`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){
            
            let respuesta = JSON.parse(response)
// console.log(respuesta);

            $('#cantidadCerdo').html(respuesta.cerdo)
            $('#cantidadChivo').html(respuesta.chivo)
            $('#cantidadCordero').html(respuesta.cordero)
            $('#cantidadPollo').html(respuesta.pollo)
            $('#cantidadVaca').html(respuesta.vaca)
        
        }

    })

}

let pathname = window.location.pathname.split('/');

if(pathname.find(element => element == 'inicio')){
   
    cargarPrecioCajas();
    
    cargarStockCajas();

}    

