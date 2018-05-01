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

var veData = {
    cursos: []
}

var vueExampleApp = new Vue({
    el: "#cursos-prof",
    data: veData,
    methods: {
        removecurso: function(cursoId){
            if(confirm('Tem certeza que deseja remover este curso: ' + cursoId)) {
                // requisição ajax para solicitar remoção
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
        }
    }
});


function getCurso() {
    $.get('/prof-get-curso', null, null, 'json').then(function(response){
        var d = response.data;
        console.log('resp', d);
        veData.cursos = d;
    });
}
