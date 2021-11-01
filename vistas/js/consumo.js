
// GENERAR NUEVOS CAMPOS DE INSUMOS

// SELECT INSUMOS
const generarSelectInsumos = (idSelect)=>{

  let data = 'select=insumos';

  let url = 'ajax/selects.ajax.php';

  $.ajax({

    method: 'post',
    url:url,
    data:data,
    success:function(response){
      
      $(`#${idSelect}`).append(response);
      
    }

  });

}

// INPUTS INSUMO KG Y $ KG
const agregarInput = (containter,editar)=>{

  let conteiner = document.getElementById(containter);

  let index = conteiner.lastChild.id ? parseInt(conteiner.lastChild.id.replace('campo','')) + 1 : 1;
  
  let lastChild = conteiner.lastChild;
  
  if(lastChild.id)
      lastChild.lastChild.remove();
  


  let row = document.createElement('div')
  row.setAttribute('class','row');
  row.setAttribute('id',`campo${editar}${index}`);
  row.setAttribute('style','margin-top:15px;');

  let col1 = document.createElement('div')
  col1.setAttribute('class','col-xs-4 col-lg-4');
  let col2 = document.createElement('div')
  col2.setAttribute('class','col-xs-3 col-lg-3');
  let col3 = col2.cloneNode(true);
  let col4 = col2.cloneNode(true);
  
  col4.removeAttribute('class','col-xs-3 col-lg-3');

  let select = document.createElement('select')
  select.setAttribute('class','form-control insumos')
  select.setAttribute('id',`insumo${editar}${index}`)
  select.setAttribute('name',`insumo${editar}[]`)
  select.setAttribute('onchange',`habilitarKgInsumos(this.id,this.value)`)
  
  generarSelectInsumos(`insumo${editar}${index}`);

  let inputKg = document.createElement('input')
  inputKg.setAttribute('type','number')
  inputKg.setAttribute('class',`form-control kgInsumo${editar}`)
  inputKg.setAttribute('id',`kgInsumo${editar}${index}`);
  inputKg.setAttribute('name',`kgInsumo${editar}[]`);
  inputKg.setAttribute('value','0');
  inputKg.setAttribute('onchange',`calcularDatos(this.id,this.value,'${editar}')`);
  inputKg.setAttribute('disabled','true');
  
  let inputPrecio = document.createElement('input')
  inputPrecio.setAttribute('type','number')
  inputPrecio.setAttribute('class',`form-control preciosInsumos${editar}`)
  inputPrecio.setAttribute('id',`precioInsumo${editar}${index}`);
  inputPrecio.setAttribute('name',`precioInsumo${editar}[]`);
  inputPrecio.setAttribute('value','0');
  inputPrecio.setAttribute('readOnly','true');

  let deleteBtn = generarDeleteBtnFormula(`campo${editar}${index},'${editar}'`);

  // let br = document.createElement('br');

  col1.append(select);
  col2.append(inputKg);
  col3.append(inputPrecio);
  col4.append(deleteBtn);


  row.append(col1,col2,col3,col4);
  
  conteiner.append(row);

}

// BTN ELIMINAR CAMPO INSUMO
const generarDeleteBtnFormula = (row,editar)=>{

  
  let propEditar = (editar == undefined) ? '' : editar;
  
  console.log('GENERARDELETEBRN ' + propEditar);

    let divDelete = document.createElement('div');
    divDelete.setAttribute('class','col-xs-1 col-lg-1');

    let btnDelete = document.createElement('button');
    btnDelete.setAttribute('class','btn btn-danger btn-no-margintop');
    btnDelete.setAttribute('onClick',`eliminarCampo(${row},'${propEditar}')`);

    let deleteIcon = document.createElement('i');
    deleteIcon.setAttribute('class','fa fa-trash');

    btnDelete.append(deleteIcon);
    divDelete.append(btnDelete);

    return divDelete;

}

const eliminarCampo = (row,editar)=>{
  
    let previousRowNode = row.previousSibling;

    if(previousRowNode.id)
        $(`#${previousRowNode.id}`).append(generarDeleteBtnFormula(previousRowNode.id));
    
    row.remove();
    
    const totales = sumarTotal(`${editar}`);

    console.log(totales);
    console.log('ELIMINARCAMPO ' + editar);

    $(`#kgTotal${editar}`).val(totales.totalKg)
    $(`#precioTotal${editar}`).val(totales.totalPrecio)

}


////********  NUEVAS CARGAS ******* ////


// CARGAR NUEVO INSUMO
$('#cargarInsumo').on('click',()=>{
  
  let insumo = $('#nombreInsumoNuevo').val();
  let precio = $('#precioInsumoNuevo').val();

  let data = `nuevoInsumo=${insumo}&precio=${precio}`;

  let url = 'ajax/consumo.ajax.php';

  $.ajax({

    method:'post',
    url:url,
    data:data,
    success:function(response){

      $('body').append(response);
      
    }
  });

});


/***************** ELIMINAR DATOS *********************/

// SWAL ELIMINAR FORMULA
const swalEliminar = (id,campo,ruta,idName)=>{

  new swal({
      title: `¿Está seguro de borrar el ${campo}?`,
      text: "¡Si no lo está puede cancelar la accíón!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: `Si, borrar ${campo}!`
    }).then(function(result){
  
      if(result.value){
  
        window.location = `index.php?ruta=${ruta}&${idName}="${id}`;
  
      }
  
    })
}

// BTN ELIMINAR FORMULA
$(".tablas").on("click", ".btnEliminarFormula", function(){

	var idFormula = $(this).attr("idFormula");

    swalEliminar(idFormula,'la formula','consumo','idFormula');

});

// ELIMINAR INSUMO
$(".tablaInsumos").on("click", ".btnEliminarInsumo", function(){

	var idInsumo = $(this).attr("idInsumo");

	new swal({
	  title: '¿Está seguro de borrar el Insumo?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar el insumo!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=consumo&idInsumo=${idInsumo}`;
  
	  }
  
	})
  
});

// ELIMINAR REGISTRO INSUMO
$(".tablaRegistroInsumos").on("click", ".btnEliminarRegistroInsumo", function(){

	var idRegistroInsumo = $(this).attr("idRegistroInsumo");

	new swal({
	  title: '¿Está seguro de borrar el Registro?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar el registro!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=consumo&idRegistroInsumo=${idRegistroInsumo}`;
  
	  }
  
	})
  
});

// ELIMINAR FORMULA

$(".tablaFormulas").on("click", ".btnEliminarFormula", function(){

	var idFormula = $(this).attr("idFormula");

	new swal({
	  title: '¿Está seguro de borrar la Formula?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar Formula!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = `index.php?ruta=consumo&idFormula=${idFormula}`;
  
	  }
  
	})
  
});

// CARGAR DATOS EN NUEVA FORMULA
const cargarDatosInsumo = (id,insumo,kilos,numeroId,editar)=>{ 

  let data = `insumo=${insumo}`;

  let url = 'ajax/consumo.ajax.php';

  $.ajax({
    method:'post',
    data:data,
    url:url,
    success:function(response){

      let respuesta = JSON.parse(response);

      let totalPrecio = parseFloat(kilos) * parseFloat(respuesta.precioKg);

      $(`#${id}${editar}${numeroId}`).val(totalPrecio);

    }

  })


}

const habilitarKgInsumos = (id,value)=>{
  
  let numeroId = id.replace('insumo','');
  
  let campoKgInsumo = document.getElementById(`kgInsumo${numeroId}`);

  if(value){
    
    document.getElementById(`kgInsumo${numeroId}`).disabled = false;    
    campoKgInsumo.value = 0;
    document.getElementById(`precioInsumo${numeroId}`).value = 0;
    
  }else{

    campoKgInsumo.disabled = true;
    campoKgInsumo.value = 0;
    document.getElementById(`precioInsumo${numeroId}`).value = 0;
  
  }
    

}

const calcularDatos = (id,value,editar)=>{
  
  let numeroId = id.replace(`kgInsumo${editar}`,'');
  
  let insumo = $(`#insumo${editar}${numeroId}`).val();  
  
  cargarDatosInsumo('precioInsumo',insumo,value,numeroId,editar);
  
  setTimeout(()=>{

      const totales = sumarTotal(editar);

      console.log(totales);
      
      console.log(`#kgTotal${editar}`);
      
      $(`#kgTotal${editar}`).val(totales.totalKg)

      $(`#precioTotal${editar}`).val(totales.totalPrecio)

    }
    ,1000);
  
}

// SUMAR CAMPOS KG Y $KG EN NUEVA FORMULA

const sumarTotal = (editar)=>{
  
  const totales = {
    
    totalKg:0,
    
    totalPrecio:0

  }
  $(`.kgInsumo${editar}`).each(function(){

    let value = parseFloat($(this).val());
    
    totales.totalKg += value;
    
  });

  
  $(`.preciosInsumos${editar}`).each(function(){

    value = parseFloat($(this).val());

    totales.totalPrecio += value;
        
  });

  return totales

}


/*******   EDITAR DATOS **********/

$(".tablaFormulas").on("click",".btnVerFormula",function(){
  
  let idFormula = $(this).attr('idformula')

  let data = `idFormula=${idFormula}`;

  let url = 'ajax/consumo.ajax.php';

  $.ajax({

    method:'post',
    data:data,
    url:url,

    success:function(response){
      
      $('#inputsContainerVer').html('')

      let respuesta = JSON.parse(response);
      
      $('#nombreFormulaVer').val(respuesta[0].nombre);
      
      $('#formulaAnimalVer').val(respuesta[0].animal);

      let totalKg = 0;
      
      let totalPrecio = 0;

      for (let index = 0; index < 3; index++) {

        let insumo = respuesta[0][`insumo${index + 1}`];

        if(insumo != null){

          let kg = respuesta[0][`kg${index + 1}`]

          totalKg += parseFloat(kg)

          let row = document.createElement('div')
          let divInsumo = row.cloneNode(true)
          let divKg = row.cloneNode(true)
          
          row.setAttribute('class','row')

          divInsumo.setAttribute('class','col-xs-4 col-lg-4')
          
          divKg.setAttribute('class','col-xs-3 col-lg-3')
          
          let  divPrecio = divKg.cloneNode(true)

          let inputKg = document.createElement('input')
          inputKg.setAttribute('type','number')
          inputKg.setAttribute('readOnly','true')
          
          let inputPrecio = inputKg.cloneNode(true)
                    
          let inputInsumo = inputKg.cloneNode(true)
          
          inputKg.setAttribute('value',kg)

          inputInsumo.setAttribute('type','text')
          inputInsumo.setAttribute('readOnly','true')
          inputInsumo.setAttribute('value',insumo)


          inputKg.setAttribute('class','form-control insumosVer')

          inputKg.setAttribute('class','form-control kgInsumoVer')

          inputInsumo.setAttribute('class','form-control')
          
          inputPrecio.setAttribute('class','form-control preciosInsumosVer')
          inputPrecio.setAttribute('id',`precioVer${index+1}`)
          
          divInsumo.append(inputInsumo)
          divKg.append(inputKg)
          divPrecio.append(inputPrecio)

          row.append(divInsumo)
          row.append(divKg)
          row.append(divPrecio)

          $('#inputsContainerVer').append(row)
          
          let br = document.createElement('br')

          $('#inputsContainerVer').append(br)

          cargarDatosInsumo('precioVer',insumo,kg,index+1,'')

        }
 
                
        $('#kgTotalVer').val(totalKg)
        
        setTimeout(() => {
          let total = 0

          $('.preciosInsumosVer').each(function(){

            total += parseFloat($(this).val())

          })
        
          $('#precioTotalVer').val(total)
          
        }, 500);
        
      }
      
    }

  })
  
});


$("#tabRacionesStock").on('click',function(){
  
  localStorage.setItem('tabConsumo','tabRacionesStock');
  
});

$("#tabInsumosFormulas").on('click',function(){
  
  localStorage.setItem('tabConsumo','tabInsumosFormulas');

});

$('a[href="consumo"]').on('click',()=>{

  localStorage.setItem('tabConsumo','tabInsumosFormulas');

});


$(()=>{

  let tabConsumo = localStorage.getItem('tabConsumo');

  $(`#${tabConsumo}`).tab('show');
});

