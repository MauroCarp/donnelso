$('.tabs-engorde li').on('click',(evt)=>{
    
    let idTab = evt.target.hash.replace('#','');
    
    localStorage.setItem('animalEngorde',idTab)
    
})



$('.tablas').on('click','.checkboxEngorde',function(){

    let node = $(this)[0];
    
    let previousNode = node
                        .parentNode
                        .previousSibling
                        .previousSibling;

    let url = 'ajax/engorde.ajax.php';

    let idAnimal = $(this).attr('idanimal')
    
    let tipo = localStorage.getItem('animalEngorde')

    let data = `idAnimal=${idAnimal}&tipo=${tipo}`
    
   if ( $(this).is(':checked') ){
        
        data += `&estado=1`

        $.ajax({
            url,
            data,
            method:'post',
            success:(response)=>{
                console.log(response);
                
                let Toast =  swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });

                let leyenda = 'Animal listo para la Venta'
                
                let avisoEstado = 'success'
                
                if(response == '"ok"'){
                
                    Toast.fire({
    
                        icon: avisoEstado,
                        title: leyenda
    
                    })

                }

                previousNode.textContent = 'Listo p/Venta' 

            }

        })
    
    }else{

        data += `&estado=0`

        $.ajax({
            url,
            data,
            method:'post',
            success:(response)=>{
                console.log(response);

                let Toast =  swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                  });

                let leyenda = 'Animal en Engorde'
                
                let avisoEstado = 'warning'
                
                if(response == '"ok"'){
                                        
                    Toast.fire({
    
                        icon: avisoEstado,
                        title: leyenda
    
                    })
                    
                }

                previousNode.textContent = 'Engorde';

            }

        })
        
    } 
        
});

$('#produccionChazinados').on('click',()=>{

    $('#divProduccion').toggle();
    
});


