
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

const renderizarStock = (stock)=>{

    let stockExplode = stock.split('.') 

    if(stockExplode.length > 1){
        
        let decimal = stockExplode[1]

        let fraccion = '';

        switch (decimal) {
            case '5':
                fraccion = '½'        
                break;
        
            case '25':
                fraccion = '¼'        
                break;
        
            case '75':
                fraccion = '¾'        
                break;
        
            default:
                break;
        }

        if(stockExplode[0] == 0)
            return fraccion
        else
            return `${stockExplode[0]} ${fraccion}`
        

    }else{

        return stock

    }
        
  
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

            let stockCerdo = renderizarStock(respuesta.cerdo)
            let stockChivo = renderizarStock(respuesta.chivo)
            let stockCordero = renderizarStock(respuesta.cordero)
            let stockPollo = renderizarStock(respuesta.pollo)
            let stockVaca = renderizarStock(respuesta.vaca)

            $('#cantidadCerdo').html(stockCerdo)
            $('#cantidadChivo').html(stockChivo)
            $('#cantidadCordero').html(stockCordero)
            $('#cantidadPollo').html(stockPollo)
            $('#cantidadVaca').html(stockVaca)
        
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

const ajaxCaravanas = (url,data)=>{

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

                let respuesta = JSON.parse(response);

                respuesta.map(animal=>{

                    $('#caravanaBuscar').append(`<option value="${animal.caravana}">${animal.caravana}</option>`)
                
                })
            
        }
    })

}

const cargarCaravanaBuscar = (tipo)=>{
    
    let url = 'ajax/ingresos.ajax.php'
    
    let data = `accion=buscarAnimal&tipo=${tipo}`
    
    $('#caravanaBuscar').html('')

    ajaxCaravanas(url,data);
    
    if(tipo == 'ovino'){
        
        data = `accion=buscarAnimal&tipo=cordero`

        ajaxCaravanas(url,data)

    }

}


$('button[data-target="#ventanaModalBuscar"]').on('click',(evt)=>{
    
    let animal = $('input[name="animalBuscar"]').val()
    
    cargarCaravanaBuscar(animal)

})

$('input[name="animalBuscar"]').on('click',(evt)=>{

    let tipo = evt.target.value

    cargarCaravanaBuscar(tipo)
 
})

