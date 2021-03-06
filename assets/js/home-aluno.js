var Vue = require("vue/dist/vue.common");

$(document).ready(function () {
  getTodosCursos();
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

var veDataTodosCursos = {
    todos: []
}

var vueTodosCurso = new Vue({
  el: "#todos-cursos",
  data: veDataTodosCursos,
  methods: {
    inscrever: function(cursoId){
      var dados = {
        id : cursoId
      }
      $.post({
          url: "/aluno-inscricao",
          dataType: "json",
          data: dados,
          success: function (result) {
            alert('Inscrição feita com sucesso!');
            getUserCursos();
            $("#modal-novos-cursos").modal('hide');
          },
          error: function (result) {
              alert("Ocorreu um erro!");
          }
      });
    }
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

var veDataCurso = {
    cursos: []
}

var vueCurso = new Vue({
    el: "#cursos-prof",
    data: veDataCurso,
    methods: {
        removecurso: function(cursoId){
            if(confirm('Tem certeza que deseja desinscrever deste curso: ' + cursoId)) {

              var dados = {
                id: cursoId
              };

              $.post({
                  url: "/remove-curso",
                  dataType: "json",
                  data: dados,

                  success: function (result) {
                    alert("Desinscrito com sucesso!");

                  },
                  error: function (result) {
                      alert("Ocorreu um erro!");
                      console.log(result);
                  }
              });

                var index = null;

                this.cursos.find(function(t, i){
                    if(t.id == cursoId) {
                        index = i;
                        return true;
                    }
                });
                if(index !== null) {
                    this.cursos.splice(index, 1);
                }
            }
        },

        seecurso: function(cursoId){
          getAulas(cursoId);
          $('#modal-aulas').modal('show');
        }

    }
});

function getUserCursos() {
  $.get('/aluno-get-cursos', null, null, 'json').then(function(response){
      var d = response.data;
      console.log('resp', d);
      veDataCurso.cursos = d;
  });
}


var veDataAula = {
    aulas: []
}

var vueAula = new Vue({
    el: "#aula-curso",
    data: veDataAula,
    methods: {
      seeaula: function(nome, aulaVideo, videoLibras){

        $("#srcAula").attr('src', aulaVideo);
        $("#srcAulaLibras").attr('src', videoLibras);
        $("#nome-aula").append(nome);
        $('#modal-aula').modal('show');

      },

    }
});

function getAulas(idCurso) {
  var dados = {
    id : idCurso
  }

  $.post({
      url: "/get-aula",
      dataType: "json",
      data: dados,
      success: function (response) {
        // alert("Curso excluido com sucesso!");
        var d = response.data;
        console.log(d);
        veDataAula.aulas = d;

      },
      error: function (response) {
          alert("Ocorreu um erro!");
          // console.log(result);
      }
  });
}
