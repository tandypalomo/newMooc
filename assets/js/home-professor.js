$(document).ready(function () {
  getCurso();
  $("#btnCadastraCurso").click(function () {

    var dados = {
        nomeCurso: $("#nomeCurso").val(),
        desc: $("#descricao").val(),
        idProfessor: $('#idProfessor').val()
    };

    $.post({
        url: "/cadastrar-curso",
        dataType: "json",
        data: dados,
        success: function (result) {
          alert("oi");
          $("#modalCadastro").modal("hide")
        },
        error: function (result) {
            alert("Ocorreu um erro!");
            console.log(result);
        }
    });

  });

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
		url: '/prof-get-curso',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){

			for(var i=0;dados.length>i;i++){
				$('#cursos').append('<li>'+dados[i].nomeCurso+'<ul id="aula"'+ dados[i].id +'></ul></li>');
			}

		}
	});

}
