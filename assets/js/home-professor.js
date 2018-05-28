var Vue = require("vue/dist/vue.common");

$(document).ready(function () {
  getCurso();
  $("#btnCadastrar").click(function () {

    var dados = {
        nomeCurso: $("#nomeCurso").val(),
        desc: $("#descricao").val(),
        youTube: $('#youTube').val()
    };

    $.post({
        url: "/cadastrar-curso",
        dataType: "json",
        data: dados,
        success: function (result) {
          alert("Curso cadastrado com sucesso!");
          getCurso();
          $("#modal-cadastro-curso").modal("hide");
          $("#modal-cadastro-curso").find('input:text').val('');
        },
        error: function (result) {
            alert("Ocorreu um erro!");
            $("#modal-cadastro-curso").modal("hide");
            console.log(result);
        }
    });

  });

  $("#nova-aula").click( function(){
    var idCurso = $("#id-curso-modal").val();
    $("#id-curso-aula").val(idCurso);
  });

  $("#btnCadastrarAula").click(function(){
    var dados = {
        nomeAula: $("#nomeAula").val(),
        desc: $("#descricaoAula").val(),
        youTube: $('#youTubeAula').val(),
        idCurso : $("#id-curso-aula").val()
    };

    $("#btnCadastrarAula").attr('disabled', 'disabled');
    $.post({
        url: "/cadastrar-aula",
        dataType: "json",
        data: dados,
        success: function (result) {
          alert("Curso cadastrado com sucesso!");
          getAula();
          $("#modal-nova-aula").modal("hide");
          $("#modal-nova-aula").find('input:text').val('');
        },
        error: function (result) {
            alert("Ocorreu um erro!");
            $("#modal-nova-aula").modal("hide");
            $("#modal-nova-aula").find('input:text').val('');
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

var veDataCurso = {
    cursos: []
}

var vueCurso = new Vue({
    el: "#cursos-prof",
    data: veDataCurso,
    methods: {
        removecurso: function(cursoId){
            if(confirm('Tem certeza que deseja remover este curso: ' + cursoId)) {

              var dados = {
                id: cursoId
              };

              $.post({
                  url: "/excluir-curso",
                  dataType: "json",
                  data: dados,
                  success: function (result) {
                    alert("Curso excluido com sucesso!");

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
          $('#id-curso-modal').val(cursoId);
        }

    }
});

function getCurso() {
    $.get('/prof-get-curso', null, null, 'json').then(function(response){
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
        removeaula: function(aulaId){
            if(confirm('Tem certeza que deseja remover esta aula: ' + aulaId)) {

              var dados = {
                id: aulaId
              };

              $.post({
                  url: "/excluir-aula",
                  dataType: "json",
                  data: dados,
                  success: function (result) {
                    alert("Aula excluida com sucesso!");

                  },
                  error: function (result) {
                      alert("Ocorreu um erro!");
                      console.log(result);
                  }
              });
                var index = null;

                this.aula.find(function(t, i){
                    if(t.id == aulaId) {
                        index = i;
                        return true;
                    }
                });
                if(index !== null) {
                    this.aula.splice(index, 1);
                }
            }
        },
        seeaula: function(nome, aulaVideo){

          $("#srcAula").attr('src', aulaVideo);
          $("#srcAulaLibras").attr('src', videoLibras);
          $("#nome-aula").append(nome);
          $('#modal-aula').modal('show');

        }
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
