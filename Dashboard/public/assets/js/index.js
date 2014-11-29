$(document).ready(function() {
      
       cargarDatos();
       estados();

	});


function cargarDatos(){

 $.getJSON('traer', {}, function(json) {
           


           for (var i = 0; i < json.length; i++) {

           	if (json[i].status=="nueva") {
           		$('#nueva').append("<div id="+json[i].id+" "+"draggable="+"true"+" "+"class=tareas" +">" + json[i].task+ 

      					'<a href="Tasks/' + json[i].id + '/edit" >Editar</a>'+
      					'<a href="Tasks/' + json[i].id + '/delete" >Eliminar</a>'

           			+ "</div>");

           	} else if (json[i].status=="proceso") {
   					$('#proceso').append("<div id="+json[i].id+" "+"draggable="+"true"+" "+"class=tareas" +">" + json[i].task + 

   					'<a href="Tasks/' + json[i].id + '/edit" >Editar</a>'+
					'<a href="Tasks/' + json[i].id + '/delete" >Eliminar</a>'

   						+"</div>");
				
				} else if (json[i].status=="finalizado") {
   					$('#finalizado').append("<div id="+json[i].id+" "+"draggable="+"true"+" "+"class=tareas" +">" + json[i].task + 
   					'<a href="Tasks/' + json[i].id + '/edit" >Editar</a>'+
					'<a href="Tasks/' + json[i].id + '/delete" >Eliminar</a>'


   						+"</div>");
				
				} else{
					$('#verificado').append("<div id="+json[i].id+" "+"draggable="+"true"+" "+"class=tareas" +">" + json[i].task + 

					'<a href="Tasks/' + json[i].id + '/edit" >Editar</a>'+
					'<a href="Tasks/' + json[i].id + '/delete" >Eliminar</a>'


						+"</div>");
				}



			
				
				};
  
        });
}

function estados(){
        var formData   = new FormData();   
//Aca lo que hace es que  se hace un puntero a los div contenedores y se dispara el evento drag
//lo cual me permite selecionar el div que deseo mover
       $('#nueva, #proceso,#finalizado,#verificado').bind('dragstart', function(event) {
          event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
           var id = event.target.getAttribute('id');
           formData.append('id',id);
          
         });

//con este metodo me permite navegar sobre los divs en los cuales puedo soltar mi div seleccionado           
            $('#nueva, #proceso,#finalizado,#verificado').bind('dragover', function(event) {
                event.preventDefault();
            });
//Con esto me permite de positar el div seleccionado en la seccion que deseo sin nigun problema
   			$('#nueva, #proceso,#finalizado,#verificado').bind('drop', function(event) {
            var notecard = event.originalEvent.dataTransfer.getData("text/plain");
            event.target.appendChild(document.getElementById(notecard));


	     var status = event.target.getAttribute('id');
	     formData.append('status',status);
	   
$.ajax({
    type: "POST",
    url: "Actualizar",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
  }).done(function( data ) {
     
    alert("actualizo estado");

    }).fail(function( data , error) {
    
    console.log(data);
    console.log(error);
  });

            event.preventDefault();
			});
        }



