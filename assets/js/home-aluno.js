$(document).ready(function () {
  // getCursos();
  getUserCursos();

    $('#sair').click(function(){

      $.ajax({
            url: "/sair",
            success: function(data){

              window.location.href = "/home";
            },
            error: function (result) {
                alert("Ocorreu um erro!");

            }
        });

      });

});

function getCurso()
{
  $.post({
		dataType: 'json',	//Definimos o tipo de retorno
		url: '/get-curso',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){

			for(var i=0;dados.length>i;i++){
				$('#cursos').append('<li>'+dados[i].nomeCurso+'<ul id="aula"'+ dados[i].id +'></ul></li>');
			}

		}
	});
}

function getUserCursos()
{
  $.post({
		dataType: 'json',	//Definimos o tipo de retorno
		url: '/get-user-cursos',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){

			for(var i=0;dados.length>i;i++){
				$('#cursos').append('<li>'+dados[i].nomeCurso+'<ul id="aula"'+ dados[i].id +'></ul></li>');
			}

		}
	});
}
