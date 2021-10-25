// CARGAR SELECTS CARAVANAS

const cargarCaravana = (tipo)=>{
    
    let data = `cargarSelect=true&tipo=${tipo}`
    
    let url = 'ajax/servicios.ajax.php'

    $.ajax({
        method: 'post',
        url,
        data,
        success:(response)=>{
            
            let caravanas = JSON.parse(response)

            $('.caravanaMachos').each(function(){

                if($(this).html() == ''){

                    for (let index = 0; index < caravanas.machos.length; index++) {
                        
                        $(this).append(`<option value="${caravanas.machos[index][0]}">${caravanas.machos[index][0]}</option>`)
                
                    }
                
                }
                
            })
                
            $('.caravanaHembras').each(function(){
                    
                if($(this).html() == ''){

                for (let index = 0; index < caravanas.hembras.length; index++) {
                    
                   $(this).append(`<option value="${caravanas.hembras[index][0]}">${caravanas.hembras[index][0]}</option>`)
            
                }
            }   
            
            
        });
  
        }

    })

    if(tipo == 'ovino'){
        
        tipo = 'cordero'

        let data = `cargarSelect=true&tipo=${tipo}`

        $.ajax({
            method: 'post',
            url,
            data,
            success:(response)=>{
                
                let caravanas = JSON.parse(response)
    
                $('.caravanaMachos').each(function(){
    
                    if($(this).html() == ''){
    
                        for (let index = 0; index < caravanas.machos.length; index++) {
                            
                            $(this).append(`<option value="${caravanas.machos[index][0]}">${caravanas.machos[index][0]}</option>`)
                    
                        }
                    
                    }
                    
                })
      
            }
    
        })

    }
}

$('input[name=animalServicio]').on('change',(evt)=>{

    let tipo = evt.target.value
        
    $('.caravanaMachos').html('')

    $('.caravanaHembras').html('')

    cargarCaravana(tipo);

});

// CONFIGURACION MODAL AGREGAR RODEO

$('#agregarHembraRodeo').on('click',()=>{

    $('#inputsHembras').append(generarInputCaravanas(propsServiciosHembras));

    propsServiciosHembras.numero += 1;    

    let tipo = $('input[name=animalServicio]:checked').val()
    
    cargarCaravana(tipo);
    
});

$('#agregarMachoRodeo').on('click',()=>{

    $('#inputsMachos').append(generarInputCaravanas(propsServiciosMachos));

    propsServiciosMachos.numero += 1;    

    let tipo = $('input[name=animalServicio]:checked').val()
    
    cargarCaravana(tipo);
    
});


// GENERAR INPUTS CARAVANAS
const propsServiciosHembras = {
    campo: 'caravanaHembras',
    numero: 1,
    idInput: 'inputsHembras',
    nombreIdInput: 'caravanaHembra',
    textContent: 'N° Caravana Hembra',
    rowId: 'rowHembra',
    idEliminar: 'eliminarCampoHembra',
    nameSelect: 'caravanaHembras'
}

const propsServiciosMachos = {
    campo: 'caravanaMachos',
    numero: 1,
    idInput: 'inputsMachos',
    nombreIdInput: 'caravanaMacho',
    textContent: 'N° Caravana Macho',
    rowId: 'rowMacho',
    idEliminar: 'eliminarCampoMacho',
    nameSelect: 'caravanaMachos'
}

const generarInputCaravanas = (props)=>{

    let inputs = document.getElementById(props.idInput);
    
    let lastChild = inputs.lastChild;
    
    if(lastChild.id)
        lastChild.lastChild.remove();


    let row = document.createElement('div');
    
    row.setAttribute('class','row');

    let rowId = `${props.rowId}${props.numero}`;

    row.setAttribute('id',`${props.rowId}${props.numero}`);
    
    // GENERO CAMPOS INPUT
    
    let divInput = document.createElement('div');
    divInput.setAttribute('class','col-xs-11 col-lg-5');
    
    // CREO FORM GROUP
    let formGroup = document.createElement('div');
    formGroup.setAttribute('class','form-group');
    
    // CREO LABEL
    let label = document.createElement('label');
    label.setAttribute('for',`${props.nombreIdInput}${props.numero}`);
    label.textContent = `${props.textContent} ${props.numero + 1}:`;

    let input = document.createElement('select');
    input.setAttribute('id',`${props.nombreIdInput}${props.numero}`); 
    input.setAttribute('class',`form-control ${props.campo}`);
    input.setAttribute('name',`${props.nameSelect}[]`);
    input.setAttribute('required',`true`);

    formGroup.append(label);
    formGroup.append(input);
    divInput.append(formGroup);
    row.append(divInput);

    let divDelete = generarDeleteBtn(rowId);

    row.append(divDelete);
        
    return row;

}

const generarDeleteBtn = (row)=>{

    let divDelete = document.createElement('div');
    divDelete.setAttribute('class','col-xs-1 col-lg-1');
    divDelete.setAttribute('style','padding-top:10px;');

    let btnDelete = document.createElement('button');
    btnDelete.setAttribute('class','btn btn-danger');
    btnDelete.setAttribute('type','button');
    btnDelete.setAttribute('onClick',`eliminarCampoServicio('${row}')`);

    let deleteIcon = document.createElement('i');
    deleteIcon.setAttribute('class','fa fa-trash');

    btnDelete.append(deleteIcon);
    divDelete.append(btnDelete);

    return divDelete;

}

const eliminarCampoServicio = (row)=>{
    
    let rowNode = document.getElementById(row);

    let previousNode = rowNode.previousSibling;
        
    if(previousNode.id)
        $(`#${previousNode.id}`).append(generarDeleteBtn(previousNode.id));
    
    rowNode.remove();

    let hembraValido = row.indexOf('Hembra');
    
    if(hembraValido != -1){

        propsServiciosHembras.numero -= 1;
        
    }else{
        
        propsServiciosMachos.numero -= 1;

    }   

}

// GENERAR RODEOS
const generarItem = (leyendaText,dato,machos)=>{

    let tipo = (localStorage.getItem('animalServicio') == 'cordero') ? 'ovino' : localStorage.getItem('animalServicio') 

    let hembraValido = leyendaText.indexOf('Hembra');
    
    let item = document.createElement('li');
    item.setAttribute('style','padding:15px;font-size:1.2em');

    let leyenda = document.createElement('b');
    leyenda.innerText = leyendaText

    let span = document.createElement('span');
    span.setAttribute('class','pull-right badge bg-blue')
    span.setAttribute('style','font-size:1.2em')
    span.innerText = dato

    let hr = document.createElement('hr')

    item.append(leyenda)
    item.append(span)

    // SOLO HEMBRAS
    if(hembraValido !== -1){

        let  caravanasMachos = machos.split('-')

        item.append(hr)

        let divContenedor = document.createElement('div')
        divContenedor.setAttribute('class','custom-control');
    
        let formGroup = document.createElement('div')
        formGroup.setAttribute('class','row madresRodeo')

        let divRow = document.createElement('div')
        divRow.setAttribute('class','row')

        let divFecha = document.createElement('div')
        divFecha.setAttribute('class','col-xs-4 col-lg-4')
        
        let fechaServida = document.createElement('input')
        fechaServida.setAttribute('type','date')
        fechaServida.setAttribute('class',`form-control`)
        fechaServida.setAttribute('id',`fechaServida${tipo}${dato}`)
        
        divFecha.append(fechaServida)
        
        let divMachos = document.createElement('div')
        divMachos.setAttribute('class','col-xs-4 col-lg-4')
        
        let selectMachos = document.createElement('select')
        selectMachos.setAttribute('class',`form-control`)
        selectMachos.setAttribute('id',`selectMachos${tipo}${dato}`)

        caravanasMachos.map(caravana => {
            
            let opt = document.createElement('option')
            opt.setAttribute('value',caravana)
            opt.innerText = caravana 

            selectMachos.append(opt)
        
        })
        
        divMachos.append(selectMachos)
        
        let divButton = document.createElement('div')
        divButton.setAttribute('class','col-xs-4 col-lg-4')
        
        let buttonServir = document.createElement('button')
        buttonServir.setAttribute('class',`btn btn-default btn-no-margintop btnServirHembra`)
        buttonServir.setAttribute('caravana',dato)
        buttonServir.setAttribute('tipo',tipo)
        buttonServir.innerText = 'Servir'

        divButton.append(buttonServir)

        caravanaServidaValida(tipo,dato,buttonServir)
      

        formGroup.append(divFecha)
        formGroup.append(divMachos)
        formGroup.append(divButton)

        divContenedor.append(formGroup)

        item.append(formGroup)

    }

    return item

}

const generarRodeo = (props)=>{
    
    let divPrincipal = document.createElement('div');
    divPrincipal.setAttribute('class',`col-xs-6 col-lg-4` );
    divPrincipal.setAttribute('style','margin-top:15px' );

    let box = document.createElement('div');
    box.setAttribute('class', 'box box-widget widget-user-2');

    let header = document.createElement('div');
    header.setAttribute('class', 'widget-user-header bg-green');

    let tituloRodeo = document.createElement('h1');
    tituloRodeo.setAttribute('class', 'widget-user-username');
    tituloRodeo.innerText = `Rodeo N° ${props.numeroRodeo}`

    let btnEliminarRodeo = document.createElement('button');
    btnEliminarRodeo.setAttribute('class','btn btn-danger btnEliminarRodeo')
    btnEliminarRodeo.setAttribute('numRodeo',props.numeroRodeo)
    btnEliminarRodeo.setAttribute('tipo',props.tipo)
    btnEliminarRodeo.setAttribute('type','button')
    btnEliminarRodeo.setAttribute('style','float:right;margin:auto auto')
    btnEliminarRodeo.setAttribute('onclick','eliminarRodeo()')

    let iconCross = document.createElement('i')
    iconCross.setAttribute('class','fa fa-times')

    btnEliminarRodeo.append(iconCross)
    header.append(btnEliminarRodeo)

    let cuerpo = document.createElement('div');
    cuerpo.setAttribute('class','box box-widget widget-user-2');
    
    let lista = document.createElement('ul');
    lista.setAttribute('class','nav nav-stacked');

    let itemFecha = generarItem('Fecha de Rodeo',convertirFecha(props.fecha),null)
    let itemCaravanaMacho = generarItem('N° Caravana Machos:',props.caravanaMacho,null)
  
    let caravanasHembras = props.caravanasHembras.split('-');

    lista.append(itemFecha);
    lista.append(itemCaravanaMacho);
    
    let numero = 1;

    caravanasHembras.map(caravana => {
        
        let item = generarItem(`Caravana Hembra ${numero}`,caravana,props.caravanaMacho)
        
        lista.append(item)
        numero++;

    })

    cuerpo.append(lista)
    header.append(tituloRodeo)
    box.append(header)
    box.append(cuerpo)

    divPrincipal.append(box)

    return divPrincipal;

}

const rodeos = (idTab,tipo)=>{
   
    let url = 'ajax/servicios.ajax.php';
    
    tipo = (tipo == 'cordero') ? 'ovino' : tipo

    let data = `mostrarRodeos=true&tipo=${tipo}`;
    console.log(data);
    
    $.ajax({
        method:'post',
        url,
        data,
        success:function(response){
            
            let respuesta = JSON.parse(response)
            
            respuesta.map(rodeo=>{
                    
               $(`#${idTab}`).append(generarRodeo(rodeo));
            
            })

        }
    });
}

$('.tabs-servicios li').on('click',(evt)=>{
    
    let idTab = evt.target.hash.replace('#','');

    let tipo = idTab.replace('Servicio','')

    localStorage.setItem('animalServicio',tipo)
    
    $(`#${idTab}`).html('');

    rodeos(idTab,tipo);
    
    setTimeout(() => {
        
        $('.btnServirHembra').on('click',(evt)=>{
                
              accionBtnServir(evt,tipo);
      
          })

    }, 200);
    
})


const accionBtnServir = (evt,tipo)=>{

        tipo = (tipo == 'cordero') ? 'ovino' : tipo

        let caravana = evt.target.attributes.caravana.nodeValue

        let textButton = evt.target.innerText;
        
        let caravanaMacho = $(`#selectMachos${tipo}${caravana}`).val()

        let fecha = $(`#fechaServida${tipo}${caravana}`).val()
                
        if(fecha == ''){

            alert('El campo Fecha no puede ir Vacio')
            
            return
        }
                        
        let props = {
            caravana,
            textButton,
            caravanaMacho,
            fecha,
            evt,
            tipo
        }
        
        servirHembra(props)

}

const servirHembra = (props)=>{

    props.estado = 'En rodeo'

    if (props.textButton == 'Servir') {
    
       props.estado = 'Servida'
        
    }

    let url = 'ajax/servicios.ajax.php'

    let data = `servirHembra=true&caravana=${props.caravana}&tipo=${props.tipo}&estadoRodeo=${props.estado}&caravanaMacho=${props.caravanaMacho}&fecha=${props.fecha}`
    
    $.ajax({
        method:'post',
        url,
        data,
        success:function(response){
            
            console.log(response);
            
            let Toast =  swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

            let leyenda = 'Hembra Servida'
            
            let avisoEstado = 'success'
            
            props.evt.target.innerText = 'Cancelar Servicio'

            if(props.estado == 'En rodeo'){
                
                leyenda = 'Servicio Cancelado'; 
                
                avisoEstado = 'warning'

                props.evt.target.innerText = 'Servir'

            }   


            if(response == 'ok'){
                
                Toast.fire({

                    icon: avisoEstado,
                    title: leyenda

                })

            }else{

            }
            
        }
    })
}

// ES CARAVANA SERVIDA 

const caravanaServidaValida = (tipo,caravana,button)=>{

    let data = `validarServicio=true&tipo=${tipo}&caravana=${caravana}`;

    let url = 'ajax/servicios.ajax.php';
    
    $.ajax({

        method: 'post',
        url,
        data,
        success:(response)=>{

            let respuesta = JSON.parse(response);

            if(respuesta.servicioValido == 1){
                
                button.innerText = 'Cancelar Servicio';
                
                $(`#selectMachos${tipo}${caravana} option[value='${respuesta.caravanaMacho}']`).attr("selected",true);
                
                $(`#fechaServida${tipo}${caravana}`).val(respuesta.fecha)

                
            }else{
                
                button.innerText = 'Servir';
                
                $(`#selectMachos${caravana} option[0]`).attr("selected",true);
                
                $(`#fechaServida${caravana}`).val('')
                
            }

        }

    });

}

$('a[href="servicios"]').on('click',()=>{
    
    localStorage.setItem('animalServicio','cerdo');

});

// ELIMINAR RODEO
const eliminarRodeo = ()=>{
    
    let numRodeo = window.event.target.attributes[1].nodeValue
    let tipo = window.event.target.attributes[2].nodeValue

    
	new swal({
        title: '¿Está seguro de desctivar el rodeo?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Si, desactivar rodeo!'
      }).then(function(result){
    
        if(result.value){
    
          window.location = `index.php?ruta=servicios&numRodeo=${numRodeo}&tipo=${tipo}`
    
        }
    
      })


}

// ELIMINAR REGISTRO RODEO

$('.tablaRegistrosServicios').on('click','.btnEliminarRegistroRodeo',function(){

    let idRodeo = $(this).attr('idRodeo');
    
});

$(()=>{

    let tipo = localStorage.getItem('animalServicio');

    let idTab = `${tipo}Servicio`;
    
    $(`#${idTab}`).html('');
    
    rodeos(idTab,tipo);

    cargarCaravana('cerdo');

    setTimeout(() => {
        
        $('.btnServirHembra').on('click',(evt)=>{
                
              accionBtnServir(evt);
      
          })
          
    }, 200);

})


