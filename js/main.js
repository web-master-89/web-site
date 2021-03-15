/*var imgruleta = document.getElementById('imgruleta');
function girar(){
		
		imgruleta.style.animationName = '';
	  setTimeout(function(){
		  imgruleta.className = 'hacergirar';
		  imgruleta.style.transform = 'rotate(8000deg)';
		  /*imgruleta.style.animationName = 'girar';},500)


}*/
$(document).ready(function() {
  $('a[href^="#"]').click(function() {
    var destino = $(this.hash);
    if (destino.length == 0) {
      destino = $('a[name="' + this.hash.substr(1) + '"]');
    }
    if (destino.length == 0) {
      destino = $('html');
    }
    $('html, body').animate({ scrollTop: destino.offset().top }, 1000);
    return false;
  });
});
/*
$(document).on('submit',function(){       
    $('#btn-ingresar').click(function(){
        var email = $('#email').val();
        var asunto = $('#asunto').val();
        var mensaje = $('#texto').val();
        var url = "../assets/mensajes.php";
         var parametros = {
            "email": email,
            "asunto": asunto,
            "mensaje": mensaje,
         };
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: parametros, 
           success: function(data)             
           {
               alert(data);
           }
       });
    });
});*/

$("#formulario").submit(function() {
  var email = $('#email').val();
  var asunto = $('#asunto').val();
  var mensaje = $('#texto').val();
  var url = "assets/mensajes.php";
    
  var parametros = {
    "f": 'crear_cliente',
    "correo": email,
    "consulta": asunto,
    "message": mensaje,
};
    if(email.length < 15)
    {
        alert('email incompleto');
     }else{
           $.ajax({
          url: url,
          data: parametros,
          type: "POST",
          success: function(data) 
          {
            alert(data);
            document.location.href='index.php';
          }
  });
  }
  return false;
});