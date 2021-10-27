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


const propsChazinados = {
    campo: 'caravanaChazinados',
    numero: 1,
    idInput: 'agregarCaravanaChazinado',
    nombreIdInput: 'caravanaChazinado',
    textContent: 'N° Caravana',
    rowId: 'rowCaravana',
}

$('#agregarCaravanaChazinado').on('click',()=>{
    

    $('#caravanaChazinadoInput').append(generarInputCaravanas(propsChazinados));

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