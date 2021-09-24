// MODAL PARIR

const propsServicios = {
    campo: 'caravanaHembras',
    numero: 1,
    idInput: 'inputsHembras',
    nombreIdInput: 'caravanaHembra',
    textContent: 'N° Caravana Hembra',
    rowId: 'rowHembra',
    idEliminar: 'eliminarCampoSanidad',
}

$('#agregarHembraRodeo').on('click',()=>{
    

    $('#inputsHembras').append(generarInputCaravanas(propsServicios));

    propsServicios.numero += 1;    

});


// GENERAR INPUTS CARAVANAS

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

    let input = document.createElement('input');
    input.setAttribute('type','text');
    input.setAttribute('id',`${props.nombreIdInput}${props.numero}`); 
    input.setAttribute('class',`form-control ${props.campo}`);
    input.setAttribute('name',`caravanaHembras[]`);
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

    
    propsServicios.numero -= 1;

}

// GENERAR RODEOS
const generarItem = (leyendaText,dato)=>{
    
    let hembraValido = leyendaText.indexOf('Hembra');
    
    let item = document.createElement('li');
    item.setAttribute('style','padding:15px;font-size:1.2em');

    let leyenda = document.createElement('b');
    leyenda.innerText = leyendaText

    let span = document.createElement('span');
    span.setAttribute('class','pull-right badge bg-blue')
    span.innerText = dato

    item.append(leyenda)
    item.append(span)

    // SOLO HEMBRAS
    if(hembraValido !== -1){

        let formGroup = document.createElement('div')
        formGroup.setAttribute('class','form-group')

        let divCheckBox = document.createElement('div')
        divCheckBox.setAttribute('class','custom-control custom-checkbox');

        let label = document.createElement('label')
        label.setAttribute('class','custom-control-label')
        label.innerText = 'Servida'
    
        let checkbox = document.createElement('input')
        checkbox.setAttribute('type','checkbox')
        checkbox.setAttribute('class',`custom-control-input`)
        checkbox.setAttribute('caravana',dato)
        checkbox.setAttribute('onchange',`hembraServida()`)
        
        divCheckBox.append(checkbox)
        divCheckBox.append(label)

        formGroup.append(divCheckBox)

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

    let cuerpo = document.createElement('div');
    cuerpo.setAttribute('class','box box-widget widget-user-2');
    
    let lista = document.createElement('ul');
    lista.setAttribute('class','nav nav-stacked');

    let itemFecha = generarItem('Fecha de Rodeo',props.fecha)
    let itemCaravanaMacho = generarItem('N° Caravana Macho:',props.caravanaMacho)
  
    let caravanasHembras = props.caravanasHembras.split('-');

    lista.append(itemFecha);
    lista.append(itemCaravanaMacho);
    
    let numero = 1;
    caravanasHembras.map(caravana => {
        
        let item = generarItem(`Caravana Hembra ${numero}`,caravana)
        
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
    
    let data = `mostrarRodeos=true&tipo=${tipo}`;
    
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
    
})

const hembraServida = ()=>{

    let event = window.event.target
    
    let caravana = event.attributes.caravana.value
        
    let tipo = localStorage.getItem('animalServicio')

    if (event.checked) {

        servirHembra(caravana,tipo,1)
        
    }else{
        
        servirHembra(caravana,tipo,0)

    }
    
}

const servirHembra = (caravana,tipo,estado)=>{

    let url = 'ajax/servicios.ajax.php'

    let data = `servirHembra=true&caravana=${caravana}&tipo=${tipo}&estadoRodeo=${estado}`
    
    $.ajax({
        method:'post',
        url,
        data,
        success:function(response){
            
            let Toast = swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

            if(response == 'ok'){
               
              
                Toast.fire({
                    icon: 'success',
                    title: 'HOLA JUAN CARLOS elitr.'
                })

            }else{

            }
            
        }
    })
}


$('a[href="servicios"]').on('click',()=>{
    
    localStorage.setItem('animalServicio','cerdo');

});

$(()=>{

    let tipo = localStorage.getItem('animalServicio');

    let idTab = `${tipo}Servicio`;
    
    $(`#${idTab}`).html('');
    
    rodeos(idTab,tipo);


})