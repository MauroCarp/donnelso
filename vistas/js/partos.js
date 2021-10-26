$('.tablaPartos').on('click','.btnVerParto',function(){

    let idParto = $(this).attr('idparto');

    verParto(idParto)
    
});

const verParto = (idParto)=>{

    let url = 'ajax/partos.ajax.php';

    let data = `accion=verParto&idParto=${idParto}`

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            let respuesta = JSON.parse(response);

            $('#partoNacidos').html('')

            $('#tipoAnimalParto').html(`<b>${capitalizarPrimeraLetra(respuesta.dataParto.tipo)}</b>`)

            $('#fechaDataParto').html(`<b>${convertirFecha(respuesta.dataParto.fecha)}</b>`)
            $('#caravanaPadreParto').html(`<b>${respuesta.dataParto.caravanaPadre}</b>`)
            $('#caravanaMadreParto').html(`<b>${respuesta.dataParto.caravanaMadre}</b>`)
            
            let cantidad = respuesta.dataParto.cantidad

            for (let index = 0; index < cantidad; index++) {

                let divTitulo = document.createElement('div')
                divTitulo.setAttribute('class','row')

                let divCaravana = divTitulo.cloneNode(true)
                
                let divSexo= divTitulo.cloneNode(true)

                let divPeso= divTitulo.cloneNode(true)

                let divComplicacion= divTitulo.cloneNode(true)

                let titulo = document.createElement('div')
                titulo.setAttribute('class','col-xs-12 col-lg-12')
                
                let b = document.createElement('b')
                b.innerText = `Nacido ${index + 1}`

                titulo.append(b)

                divTitulo.append(titulo)

                let caravana = document.createElement('div')
                caravana.setAttribute('class','col-xs-6 col-lg-6')
                let caravanaValue = caravana.cloneNode(true)
                caravanaValue.setAttribute('style','font-weight:bold');

                let sexo = caravana.cloneNode(true)
                let sexoValue = caravanaValue.cloneNode(true)
                
                let peso = caravana.cloneNode(true)
                let pesoValue = caravanaValue.cloneNode(true)

                let complicacion = caravana.cloneNode(true)
                let complicacionValue = caravanaValue.cloneNode(true)

                caravana.innerText = 'Caravana: '
                sexo.innerText = 'Sexo: '
                peso.innerText = 'Peso: '
                complicacion.innerText = 'Complicacion: '
                
                caravanaValue.innerText = respuesta.dataParto[`nacido${index}`].caravana
                sexoValue.innerText = (respuesta.dataParto[`nacido${index}`].sexo == 'M') ? 'Macho' : 'Hembra'
                pesoValue.innerText = respuesta.dataParto[`nacido${index}`].peso
                complicacionValue.innerText = (respuesta.dataParto[`nacido${index}`].complicacion == '') ? '-' : respuesta.dataParto[`nacido${index}`].complicacion  

                divCaravana.append(caravana)
                divCaravana.append(caravanaValue)

                divSexo.append(sexo)
                divSexo.append(sexoValue)

                divPeso.append(peso)
                divPeso.append(pesoValue)

                divComplicacion.append(complicacion)
                divComplicacion.append(complicacionValue)

                let hr = document.createElement('hr')

                $('#partoNacidos').append(divCaravana)
                $('#partoNacidos').append(divSexo)
                $('#partoNacidos').append(divPeso)
                $('#partoNacidos').append(divComplicacion)
                $('#partoNacidos').append(hr)
            }
        }
    });

}