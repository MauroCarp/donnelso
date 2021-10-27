
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

	let data = `accion=cargarStock&tabla=null`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){

            let respuesta = JSON.parse(response)

            $('#cantidadCerdo').html(respuesta.cerdo)
            $('#cantidadChivo').html(respuesta.chivo)
            $('#cantidadCordero').html(respuesta.cordero)
            $('#cantidadPollo').html(respuesta.pollo)
            $('#cantidadVaca').html(respuesta.vaca)
        
        }

    })

}

const cargarStockChazinados = ()=>{

	let url = 'ajax/precios.ajax.php';

	let data = `accion=cargarStock&tabla=chazinados`;

	$.ajax({
		method:'post',
		data,
		url,
		success:function(response){
            
            let respuesta = JSON.parse(response)
            
            $('#kilosSalame').html(respuesta[0].kgSalame)
            $('#kilosChorizo').html(respuesta[0].kgChorizo)
            $('#kilosMorcilla').html(respuesta[0].kgMorcilla)
            $('#kilosBondiola').html(respuesta[0].kgBondiola)
            $('#kilosJamon').html(respuesta[0].kgJamon)
            $('#kilosCodeguin').html(respuesta[0].kgCodeguin)
            $('#kilosGrasa').html(respuesta[0].kgGrasa)
            $('#kilosChicharron').html(respuesta[0].kgChicharron)
            $('#kilosCarne').html(respuesta[0].kgCarne)
        
        }

    })

}

let pathname = window.location.pathname.split('/');

if(pathname.find(element => element == 'inicio')){
   
    cargarPrecioCajas();
    
    cargarStockCajas();
    
    cargarStockChazinados();

}    

