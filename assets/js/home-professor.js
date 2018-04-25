$(document).ready(function () {

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
