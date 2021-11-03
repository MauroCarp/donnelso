
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

 
const mostrarRodeos = (caravana,tipo, idTbody)=>{

    let data = `mostrarRodeosBuscar=true&caravana=${caravana}&tipo=${tipo}`
    
    let url = 'ajax/servicios.ajax.php'

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            respuesta = JSON.parse(response)
            
            respuesta.map(rodeo=>{
                  
                let fila = document.createElement('tr')

                let numRodeo = document.createElement('td')
                let fecha = numRodeo.cloneNode(true)
                let caravanasHembras = numRodeo.cloneNode(true)
                let caravanasMachos = numRodeo.cloneNode(true)

                numRodeo.innerText = rodeo.numeroRodeo
                fecha.innerText = convertirFecha(rodeo.fecha)
                caravanasHembras.innerText = rodeo.caravanasHembras
                caravanasMachos.innerText = rodeo.caravanaMacho
                
                fila.append(numRodeo)
                fila.append(fecha)
                fila.append(caravanasHembras)
                fila.append(caravanasMachos)

                 $(`#${idTbody}`).append(fila)

            })
            
        }
    
    })

}

const mostrarPartos = (caravana,tipo, idTbody)=>{

    let data = `accion=mostrarPartos&caravana=${caravana}&tipo=${tipo}`
    
    let url = 'ajax/partos.ajax.php'

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            respuesta = JSON.parse(response)
            console.log(respuesta);
            
            respuesta.map(parto=>{
                
                let mellizosText = (parto.mellizo == 0) ? 'NO' : 'SI'
                
                let fila = document.createElement('tr')

                let carPadre = document.createElement('td')
                let fecha = carPadre.cloneNode(true)
                let cantidad = carPadre.cloneNode(true)
                let sexo = carPadre.cloneNode(true)
                let mellizos = carPadre.cloneNode(true)
                let complicacion = carPadre.cloneNode(true)

                carPadre.innerText = parto.caravanaPadre
                fecha.innerText = convertirFecha(parto.fecha)
                cantidad.innerText = parto.cantidad
                sexo.innerText = parto.sexo
                mellizos.innerText = mellizosText
                complicacion.innerText = parto.complicacion
                
                fila.append(carPadre)
                fila.append(fecha)
                fila.append(cantidad)
                fila.append(sexo)
                fila.append(mellizos)
                fila.append(complicacion)

                $(`#${idTbody}`).append(fila)

            })
            
        }
    
    })

}

$('button[data-target="#ventanaModalBuscar"]').on('click',()=>{
    
    let animal = $('input[name="animalBuscar"]').val()
    
    cargarCaravanaBuscar(animal)

})

$('#btnBuscarAnimal').on('click',(evt)=>{

    evt.preventDefault()

    let tipo = $('input[name="animalBuscar"]').val();

    let caravana =  $('#caravanaBuscar').val()

    let data = `accion=mostrarAnimal&tipo=${tipo}&caravana=${caravana}`
    
    let url = 'ajax/inicio.ajax.php'

    $('#ventanaModalVerAnimal').show();

    // CARGAR DATA VER ANIMAL

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            respuesta = JSON.parse(response)
            
            idAnimal = respuesta[0].idAnimal 

            let caravana = respuesta[0].caravana

            let sexo = respuesta[0].sexo

            let destino = respuesta[0].destino

            let tipo = respuesta[0].tipo

            $('#caravanaBuscada').val(caravana)

            if(sexo == 'M'){
                
                $('#sexoMacho').attr('checked',true)
                $('#sexoHembra').removeAttr('checked')
            
            }else{
                
                $('#sexoHembra').attr('checked',true)
                $('#sexoMacho').removeAttr('checked')
            
            }

            $('#btnProveedor').html(respuesta[0].proveedor)

            $('#btnDestinoBuscar').html(destino)

            let opt = (respuesta[0].estadoBuscar == undefined) ? '<option value="">-</option>' : `<option value="${respuesta[0].estadoBuscar}">${respuesta[0].estadoBuscar}</option>`  

            $('#estadoBuscar').append(opt)

            $('#complicacionBuscar').innerText = (respuesta[0].complicacion == null) ? '-' : respuesta[0].complicacion

            let optDestino =  `<option value="${destino}">${destino}</option>`
            
            $('#destinoBuscar').append(optDestino)

            if(destino == 'Engorde'){
                
                $('#divEngorde').show();
                $('#divReproductor').hide();

                $('#fechaIngresoBuscar').val(respuesta[0].fecha)

                (respuesta[0].listoVenta) ? $('#listoVentaBuscar').attr('checked') : $('#listoVentaBuscar').removeAttr('checked')
                
            }else{
                
                $('#divEngorde').hide();
                $('#divReproductor').show();

                if(sexo == 'H'){

                    $('#reproductorHembra').show()
                    $('#reproductorMacho').hide()
                    mostrarPartos(caravana,tipo,'partosBuscar')
                    mostrarRodeos(caravana,tipo,'rodeosHembraBuscar')
                    
                    
                }else{
                    
                    $('#reproductorMacho').show()
                    $('#reproductorHembra').hide()
                    mostrarRodeos(caravana,tipo,'rodeosMachoBuscar')

                }

            }

            if(respuesta[0].proveedor == 'Propio'){

            }else{

            }

        }

    })
    
    
})

$('input[name="animalBuscar"]').on('click',(evt)=>{

    let tipo = evt.target.value

    cargarCaravanaBuscar(tipo)

    $('#ventanaModalVerAnimal').hide();

 
})

$('#caravanaBuscar').on('change',()=>{

    $('#ventanaModalVerAnimal').hide()

})

