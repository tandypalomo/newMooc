var Vue = require("vue/dist/vue.common");

$(document).ready(function () {
  getTodosCursos();
  // getUserCursos();

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

var veDataTodosCursos = {
    todos: []
}

var vueTodosCurso = new Vue({
  el: "#todos-cursos",
  data: veDataTodosCursos,
  methods: {

  }
});

function getTodosCursos()
{
  $.get('/get-todos-cursos', null, null, 'json').then(function(response){
      var d = response.data;
      console.log('resp', d);
      veDataTodosCursos.todos = d;
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
