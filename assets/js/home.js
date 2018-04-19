
    $(document).ready(function () {

        $("#btnCadastrar").click(function () {

            var dados = {
                txtNome: $("#txtNome").val(),
                txtEmail: $("#txtEmail").val(),
                cpf: $("#cpf").val(),
                senha: $("#senha").val(),
                txtTelefone: $("#txtTelefone").val(),
                tipo: $("#tipo").val()
            };

            $.post({
                url: "/cadastrar",
                dataType: "json",
                data: dados,
                success: function (result) {
                  alert(result.message);
                  $("#modalCadastro").modal("hide")
                },
                error: function (result) {
                    alert("Ocorreu um erro!");
                    console.log(result);
                }

            });
        });


        $("#btnLogin").click(function () {

            var dados = {
                email: $("#emailLogin").val(),
                senha: $("#senhaLogin").val()
            };

            $.post({
                url: "/logar",
                type: "post",
                dataType: "html",
                data: dados,
                success: function (result) {
                    //0->aluno 1->professor 2->admin
                    if (result == '0') {
                        location.href = '/aluno';
                    }
                    if (result == '1') {
                        location.href = '/professor';
                    }
                    if (result == '2') {
                        location.href = '/interprete';
                    }
                    $("#resultado").html(result);
                },
                error: function (result) {
                    alert("Erro inesperado!")
                }

            });
        });

        $('.btn-sair').click(function(){
          $.ajax({
                url: "../Action/UsuarioAC.php?req=sair",
                success: function(data){
                    window.location.href = data;
                }
            });

          });



});
