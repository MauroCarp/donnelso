
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

const ajaxCaravanas = (url,data,idSelect)=>{

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

                let respuesta = JSON.parse(response);

                respuesta.map(animal=>{

                    $(`#${idSelect}`).append(`<option value="${animal.caravana}">${animal.caravana}</option>`)
                
                })
            
        }
    })

}

const cargarCaravanaBuscar = (tipo,idSelect)=>{
    
    let url = 'ajax/ingresos.ajax.php'
    
    let data = `accion=buscarAnimal&tipo=${tipo}`
    
    console.log(data,url);
    
    $(`#${idSelect}`).html('')

    ajaxCaravanas(url,data,idSelect);
    
    if(tipo == 'ovino'){
        
        data = `accion=buscarAnimal&tipo=cordero`

        ajaxCaravanas(url,data,idSelect)

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

const mostrarSanidad = (caravana,tipo,idTbody)=>{

    let data = `mostrarSanidad=true&caravana=${caravana}&tipo=${tipo}`
    
    let url = 'ajax/sanidad.ajax.php'

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            respuesta = JSON.parse(response)
            
            respuesta.map(sanidad=>{
                
                let fila = document.createElement('tr')

                let caravana = document.createElement('td')
                let fecha = caravana.cloneNode(true)
                let motivo = caravana.cloneNode(true)
                let comentario = caravana.cloneNode(true)
                let gastoVet = caravana.cloneNode(true)

                caravana.innerText = sanidad.caravana
                fecha.innerText = convertirFecha(sanidad.fecha)
                motivo.innerText = capitalizarPrimeraLetra(sanidad.motivo)
                comentario.innerText = sanidad.comentarios
                gastoVet.innerText = `$ ${sanidad.gastoVet}`
                
                fila.append(caravana)
                fila.append(fecha)
                fila.append(motivo)
                fila.append(comentario)
                fila.append(gastoVet)

                $(`#${idTbody}`).append(fila)

            })
            
        }
    
    })

}

$('button[data-target="#ventanaModalBuscar"]').on('click',()=>{
    
    let animal = $('input[name="animalBuscar"]').val()
    
    cargarCaravanaBuscar(animal,'caravanaBuscar')

})

$('#btnBuscarAnimal').on('click',function(){
    
    let caravanaValue = $('#caravanaBuscar').val()
    
    if(caravanaValue == null){

        let title = "No hay ninguna Caravana Seleccionada"
        let icon = 'error'
        
        new swal({

            icon,
            title,
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

        })
        return 
    }


    let tipo = $('input[name="animalBuscar"]:checked').val();
    
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
            
            let idAnimal = respuesta[0].idAnimal 

            let caravana = respuesta[0].caravana

            let sexo = respuesta[0].sexo

            let destino = respuesta[0].destino

            let tipo = respuesta[0].tipo

            let proveedor = respuesta[0].proveedor

            $('#caravanaBuscada').val(caravana)
            
            $('#idAnimalBuscada').val(idAnimal)

            $('#edadBuscada').val(respuesta[0].edad)
            
            $('#btnProveedor').html(respuesta[0].proveedor)

            $('#btnDestinoBuscar').html(destino)
            
            let opt = (respuesta[0].estado == undefined) ? '<option value="">-</option>' : `<option value="${respuesta[0].estado}">${respuesta[0].estado}</option>`  
            
            console.log(opt);
            
            $('#estadoBuscar').append(opt)

            let complicacion = (respuesta[0].complicacion != null) ? respuesta[0].complicacion : '-'

            $('#complicacionBuscar').append(complicacion) 

            let optDestino =  `<option value="${destino}">${destino}</option>`
            
            $('#destinoBuscar').append(optDestino)

            let optProveedor = `<option value="${proveedor}">${proveedor}</option>`

            $('#proveedorBuscar').append(optProveedor)
            
            let peso = parseFloat(respuesta[0].peso)

            $('#pesoBuscada').val(peso.toFixed(2))
            $('#pesoCompraBuscada').val(peso.toFixed(2))

            $('#fechaCompraBuscada').val(respuesta[0].fecha)

            if(sexo == 'M'){
                
                $('#sexoMacho').attr('checked',true)
                $('#sexoHembra').removeAttr('checked')
            
            }else{
                
                $('#sexoHembra').attr('checked',true)
                $('#sexoMacho').removeAttr('checked')
            
            }

            if(destino == 'Engorde'){
                
                $('#divEngorde').show();
                $('#divReproductor').hide();

                $('#fechaIngresoBuscar').val(respuesta[0].fecha)

                if(respuesta[0].listoVenta == 1)
                    $('#listoVentaBuscar').attr('checked','checked')
                else
                    $('#listoVentaBuscar').removeAttr('checked')
                
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

            if(proveedor == 'Propio'){

                $('#proveedorPropio').show()
                $('#proveedorOtro').hide()
                
            }else{

                $('#proveedorPropio').hide()
                $('#proveedorOtro').show()
                
            }

            mostrarSanidad(tipo,caravana,'sanidadBuscar')
        }

    })
    
    
})

$('input[name="animalBuscar"]').on('click',(evt)=>{

    let tipo = evt.target.value

    cargarCaravanaBuscar(tipo,'caravanaBuscar')

    const props = {
        onOff: false,
        destino:null,
        estado:null,
        estados,
        proveedor:null
    }

    activarEdicion(props)

    $('#ventanaModalVerAnimal').hide();

 
})

$('#caravanaBuscar').on('change',()=>{

    const props = {
        onOff: false,
        destino:null,
        estado:null,
        estados,
        proveedor:null
    }

    activarEdicion(props)

    $('#ventanaModalVerAnimal').hide()

})


// ACTIVAR EDICION DE ANIMAL BUSCADO

const selectProveedores = (idDiv,proveedor)=>{

    let data = 'tabla=proveedores'

    let url = 'ajax/proveedores.ajax.php'

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{
            console.log(response);
            
            if(proveedor != 'Propio'){

                $(`#${idDiv}`).append('<option value="Propio">Propio</option>')
                
            }
            
            $(`#${idDiv}`).append(response)
        
        }

    })
}

const estados = ['Malo','Regular','Bueno','Muy Bueno']


const activarEdicion = (props)=>{

    if(props.onOff){

        $('#caravanaBuscada').removeAttr('readOnly')
        $('#edadBuscada').removeAttr('readOnly')
        $('#sexoMacho').removeAttr('disabled')
        $('#sexoHembra').removeAttr('disabled')
        $('#estadoBuscar').removeAttr('readOnly')
        $('#complicacionBuscar').removeAttr('disabled')
        $('#destinoBuscar').removeAttr('readOnly')
        $('#proveedorBuscar').removeAttr('readOnly')
        $('#pesoBuscada').removeAttr('readOnly')
        $('#listoVentaBuscar').removeAttr('disabled')
        
        props.estados.map(estadoKey=>{
            
            let opt = document.createElement('option')
            opt.setAttribute('value',estadoKey)
            opt.innerText = estadoKey
            
            if(estadoKey != props.estado)
                $('#estadoBuscar').append(opt)
        
        })

        let optDestino = (props.destino == 'Reproductor') ? '<option value="Engorde">Engorde</option>' : '<option value="Reproductor">Reproductor</option>' 

        $('#destinoBuscar').append(optDestino)

        selectProveedores('proveedorBuscar', props.proveedor)

        $('#activarEdicion').hide();
        $('#editarAnimal').show();
        
    }else{
        
        $('#caravanaBuscada').attr('readOnly','readOnly')
        $('#edadBuscada').attr('readOnly','readOnly')
        $('#sexoMacho').attr('disabled','disabled')
        $('#sexoHembra').attr('disabled','disabled')
        $('#estadoBuscar').attr('readOnly','readOnly')
        $('#complicacionBuscar').attr('disabled','disabled')
        $('#destinoBuscar').attr('readOnly','readOnly')
        $('#proveedorBuscar').attr('readOnly','readOnly')
        $('#pesoBuscada').attr('readOnly','readOnly')
        $('#listoVentaBuscar').attr('disabled','disabled')




        $('#activarEdicion').show();
        $('#editarAnimal').hide();

    }

}


$('#activarEdicion').on('click',()=>{

    let destino = $('#btnDestinoBuscar').innerText

    let estado = $('#estadoBuscar').val() 
    
    let proveedor = $('#proveedorBuscar').val() 
    
    const propsBuscar = {
        onOff: true,
        destino,
        estado,
        estados,
        proveedor
    }
    
    activarEdicion(propsBuscar)

})