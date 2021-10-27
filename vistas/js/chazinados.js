$("#propioChazinado").on('change',()=>{

    let checkboxPropio = document.getElementById('propioChazinado');

    if (!checkboxPropio.checked){

        $('#caravanaChazinadoInput').hide();
        $('#inputPrecioKgVivo').show();
        
    } else {
        
        $('#caravanaChazinadoInput').show();
        $('#inputPrecioKgVivo').hide();

    }


})


const generarInputCaravanasChazinados = (props)=>{

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

    input.append(selectCaravanaChazinados(`${props.nombreIdInput}${props.numero}`))

    formGroup.append(label);
    formGroup.append(input);
    divInput.append(formGroup);
    row.append(divInput);

    let divDelete = generarDeleteBtn(rowId,props.funcionEliminar);

    row.append(divDelete);
        
    return row;

}

const eliminarCampoChazinados = (row,funcionEliminar)=>{
    
    let rowNode = document.getElementById(row);

    let previousNode = rowNode.previousSibling;
        
    if(previousNode.id)
        $(`#${previousNode.id}`).append(generarDeleteBtn(previousNode.id,funcionEliminar));
            
    rowNode.remove();

    propsChazinados.numero -= 1

}

const propsChazinados = {
    campo: 'caravanaChazinados',
    numero: 1,
    idInput: 'caravanaChazinadoInput',
    nombreIdInput: 'caravanaChazinado',
    nameSelect: 'caravanaChazinado',
    textContent: 'N° Caravana',
    rowId: 'rowCaravana',
    funcionEliminar:'eliminarCampoChazinados'
}


$('#agregarCaravanaChazinado').on('click',()=>{
    

    $('#caravanaChazinadoInput').append(generarInputCaravanasChazinados(propsChazinados));

    propsChazinados.numero += 1;

});


const productos = ['salame','chorizo','morcilla','codeguin','jamon','bondiola','chicharron','grasa','carne']


let contadorVenta = 1

const agregarProducto = (numero)=>{

    let inputs = document.getElementById(`selectsChazinados`);
    
    let lastChild = inputs.lastChild;
    
    if(lastChild.id)
        lastChild.lastChild.remove();


        console.log(inputs);
        
    let contenedor = document.createElement('div');
    contenedor.setAttribute('class',`row`)
    contenedor.setAttribute('id',`row${numero}`)

    let divProductos = document.createElement('div')
    divProductos.setAttribute('class','col-xs-5 col-lg-5')

    let divKg = divProductos.cloneNode(true)

    let divFormProductos = document.createElement('div')
    divFormProductos.setAttribute('class','form-group')

    let divFormKg = divFormProductos.cloneNode(true)

    let labelProductos = document.createElement('label')

    let labelKg = labelProductos.cloneNode(true)

    labelProductos.setAttribute('for',`producto${numero}`)
    labelProductos.innerText = 'Producto:'
    
    labelKg.setAttribute('for',`kg${numero}`)
    labelKg.innerText = 'Kg:'

    let selectProducto = document.createElement('select')
    selectProducto.setAttribute('id',`producto${numero}`)
    selectProducto.setAttribute('name',`productos[]`)
    selectProducto.setAttribute('class',`form-control productos`)
    selectProducto.setAttribute('required',`required`)
        
    productos.map(producto=>{

        let opt = document.createElement('option')
        opt.setAttribute('value',producto)
        opt.innerText = capitalizarPrimeraLetra(producto)

        selectProducto.append(opt)

    })

    let inputKg = document.createElement('input')
    inputKg.setAttribute('id',`kg${numero}`)
    inputKg.setAttribute('name',`kg[]`)
    inputKg.setAttribute('type',`number`)
    inputKg.setAttribute('class',`form-control kilos`)
    inputKg.setAttribute('required',`required`)

    divFormProductos.append(labelProductos)
    divFormProductos.append(selectProducto)

    
    divFormKg.append(labelKg)
    divFormKg.append(inputKg)

    divProductos.append(divFormProductos)
    divKg.append(divFormKg)

    contenedor.append(divProductos)
    contenedor.append(divKg)
    contenedor.append(generarDeleteBtnProducto(`row${numero}`))

    console.log(contenedor);
    
    $('#selectsChazinados').append(contenedor)

}

$('#agregarProducto').on('click',()=>{
   
    agregarProducto(contadorVenta)

    contadorVenta++;

})

const generarDeleteBtnProducto = (row)=>{

    let divDelete = document.createElement('div');
    divDelete.setAttribute('class','col-xs-1 col-lg-1');

    let btnDelete = document.createElement('button');
    btnDelete.setAttribute('class','btn btn-danger');
    btnDelete.setAttribute('type','button');
    btnDelete.setAttribute('onClick',`eliminarCampoProducto('${row}')`);

    let deleteIcon = document.createElement('i');
    deleteIcon.setAttribute('class','fa fa-trash');

    btnDelete.append(deleteIcon);
    divDelete.append(btnDelete);

    return divDelete;

}

const eliminarCampoProducto = (row)=>{

    let rowNode = document.getElementById(row);

    let previousNode = rowNode.previousSibling;
        
    if(previousNode.id)
        $(`#${previousNode.id}`).append(generarDeleteBtnProducto(previousNode.id));
    
    rowNode.remove();

    contadorVenta -= 1;

}

$('.tablaVentasChazinados').on('click','.btnPedidoRealizado',function(){


    let idPedido = $(this).attr('idPedido')

    let estado = ($(this).attr('estado') == 0) ? 1 : 0

    let url = 'ajax/chazinados.ajax.php'

    let data = `idPedido=${idPedido}&estado=${estado}`

    let icon = document.createElement('i')

    $.ajax({
        method:'post',
        url,
        data,
        success:(response)=>{

            response = JSON.parse(response);
            
            let title = "El pedido ha sido realizado"
            let icon = 'success'
            
            if(response.estado == 0){
                
                title = "El pedido no esta realizado"
                icon = 'error'
            
            }

                new swal({

                    icon,
                    title,
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    window.location = 'ventasChazinado'

                });
               
        }

    })
    

});

const selectCaravanaChazinados = (idSelect)=>{

    let url = 'ajax/chazinados.ajax.php'

    let data = 'accion=cargarSelect&tipo=cerdo'

    $.ajax({
        method:'post',
        data,
        url,
        success:(response)=>{

            $(`#${idSelect}`).append(response)

        }
    })
}
