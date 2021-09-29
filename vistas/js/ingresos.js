// MODAL PARIR

$('#btnParirModal').on('click',(evt)=>{
    
    evt.preventDefault();
    
    let caravanaMadre = $('#caravanaParto').val();
    
    let tipoAnimal = $("input[name=animal]").val();
    
    let data = `caravanaMadre=${caravanaMadre}&tipo=${tipoAnimal}`;
    
    console.log(data);
    
    let url = 'ajax/ingresos.ajax.php';

    $.ajax({

        method: 'POST',
        url: url,
        data:data,
        success:function(response){

            let respuesta = JSON.parse(response);
                        
            if(respuesta.caravanaValida == 1){
                
                $('#inputNacimientos').show();

            }else{

                alert(`No hay ${capitalizarPrimeraLetra(tipoAnimal)} Madre que coincida con esa Caravana.`);
            }
            
        }


    });


        // $('#inputNacimientos').css('display','block');


});


// GENERAR CAMPOS FORMULARIO

const generarNacido = (numero)=>{

    // CREO ROW
    let row = document.createElement('div');
    
    row.setAttribute('class','row');
    
    // GENERO CAMPOS INPUT/SELECT/TEXTAREA

    row.append(generarInputNacido('peso','number',`pesoNacido${numero}`));
    row.append(generarInputNacido('sexo','radio',`sexoNacido${numero}`));
    row.append(generarSelectNacido('estado',`estadoNacido${numero}`,['Bueno','Regular','Malo']));
    row.append(generarSelectNacido('destino',`destinoNacido${numero}`,['Engorde','Reproductor']));
    row.append(generarInputNacido('caravana','text',`caravanaNacido${numero}`));
    row.append(generarInputNacido('complicacion','textarea',`complicacionNacido${numero}`));
    
    return row;

}

const generarInputNacido = (campo,type,id)=>{
   
    // CREO DIV COLUMNA
    let divInput = document.createElement('div');
    divInput.setAttribute('class','col-xs-12 col-lg-2');
    
    // CREO FORM GROUP
    let formGroup = document.createElement('div');
    formGroup.setAttribute('class','form-group');
    
    // CREO LABEL
    let label = document.createElement('label');
    label.setAttribute('for',campo);
    label.textContent = `${capitalizarPrimeraLetra(campo)}:`;

    formGroup.append(label);

    // SI ES TEXT AREA
    if(type == 'textarea'){

        let textarea = document.createElement('textarea');
        textarea.setAttribute('class','form-control');
        textarea.setAttribute('id',id);
        textarea.setAttribute('rows','3');
    
        formGroup.append(label);
        formGroup.append(textarea);
        divInput.append(formGroup);

        // SI EL TYPE ES TEXTAREA SE CORTA LA EJECUCION CON EL RETURN

        return divInput;
    }

 
    let input = document.createElement('input');
    input.setAttribute('type',type);

    if(type != 'radio'){

        input.setAttribute('id',id);
        input.setAttribute('class',`form-control ${campo}`);

        if(type == 'number')
            input.setAttribute('step','0.50');

        formGroup.append(input);

    }else{
        let divSexo = document.createElement('div');
        divSexo.setAttribute('id',id);
    
        input.setAttribute('name',campo);
        input.setAttribute('class',campo);
        input.setAttribute('value','M');
        input.setAttribute('style','height:20px;width:20px;');
        
        let textInputM = document.createElement('b');
        textInputM.textContent = 'M';

        divSexo.append(input)
        divSexo.append(textInputM);
        
        let inputH = input.cloneNode(true);
        inputH.removeAttribute('value');
        inputH.setAttribute('value','H');

        textInputH = textInputM.cloneNode(true);
        textInputH.textContent = 'H';

        divSexo.append(inputH)
        divSexo.append(textInputH);

        formGroup.append(divSexo);
    }


    divInput.append(formGroup);

    return divInput;
}

const generarSelectNacido = (campo,id,options)=>{
    
    let divSelect = document.createElement('div');
    divSelect.setAttribute('class','col-xs-12 col-lg-3');
    
    let formGroup = document.createElement('div');
    formGroup.setAttribute('class','form-group');
    
    let label = document.createElement('label');
    label.setAttribute('for',campo);
    label.textContent = `${capitalizarPrimeraLetra(campo)}:`;

    let select = document.createElement('select');
    select.setAttribute('id',id);
    select.setAttribute('class',`form-control ${campo}`);

    options.map((opcion)=>{

        let optionHtml = document.createElement('option');
        optionHtml.setAttribute('value',opcion);
        let optionTitle = document.createTextNode(`${opcion}`);
        optionHtml.append(optionTitle);
        select.append(optionHtml);
        
    });

    
    formGroup.append(label);
    formGroup.append(select);

    divSelect.append(formGroup);

    return divSelect;

}

$('#cantidadNacidos').on('change',()=>{

    $('.rowNacidos').remove();
    
    let cantidad = $('#cantidadNacidos').val();

    const inputNacidos = document.getElementById('inputNacidos');

    // GENERO CAMPO NACIMIENTO
    for (let index = 0; index < cantidad; index++) {
        
        let rowNacido = document.createElement('div');
        rowNacido.setAttribute('class','rowNacidos');

        let titulo = document.createElement('h2');
        let numeroTitulo = document.createTextNode(`N° ${index + 1}`);
        
        titulo.append(numeroTitulo);

        rowNacido.append(titulo);
        
        let hr = document.createElement('hr');
        rowNacido.append(hr);

        // GENERO CAMPOS DE FORMULARIO
        let camposNacidos = generarNacido(index + 1);

        rowNacido.append(camposNacidos);

        inputNacidos.append(rowNacido);

    }

         
});

$("input[name='animalCompra']").on('change',function(){

    let value = $(this).val();
    
    if(value == 'pollo'){

        $('#cantidadCompra').show();
        $('#cantidadMHCompra').hide();
    }else{
        
        $('#cantidadCompra').hide();
        $('#cantidadMHCompra').show();

    }

})


// CAMPO OTRO PROVEEDOR

$('#proveedorCompra').on('change', evt => {

    let value = evt.target.value;

    (value === 'otroProvCompra') ? $('#nuevoProvCompra').show() : $('#nuevoProvCompra').hide(); 
    
    
});

// TABLA REGISTROS DE COMPRAS

$('.tablaCompras').DataTable({
    "ajax": "ajax/dataTable-Compras.ajax.php",
    "deferRender": true,
	"retrieve": true,
    "aaSorting": [[ 0, "desc" ]],
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			}

	}

} );


// ELIMINAR COMPRA

$(".tablaCompras").on("click", ".btnEliminarCompra", function(){

	var idCompra = $(this).attr("idCompra");

	new swal({
	  title: '¿Está seguro de borrar la compra?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar venta!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=registrosCompras&idCompra=${idCompra}`;
  
	  }
  
	})
  
  });


// CARGAR SELECT PROVEEDORES

$(()=>{

    let data = 'tabla=proveedores';

    let url = 'ajax/proveedores.ajax.php';


    $.ajax({
        
        method: 'POST',
        url: url,
        data: data,
        success:function(response){

            $('#proveedorCompra').prepend(response);
        }

    });

});

