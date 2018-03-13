
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

            $.ajax({
                url: "/cadastrar",
                type: "post",
                dataType: "html",
                data: dados,
                success: function (result) {
                    alert("Cadastro realizado");
                },
                error: function (result) {
                    alert("Ocorreu um erro!");
                    console.log(result);
                }

            });
        });


        $("#btnLogar").click(function () {

            var dados = {
                email: $("#emailLogin").val(),
                senha: $("#senhaLogin").val()
            };

            $.ajax({
                url: "../Action/UsuarioAC.php?req=logar",
                type: "post",
                dataType: "html",
                data: dados,
                success: function (result) {
                    //0->aluno 1->professor 2->admin
                    if (result == '0') {
                        location.href = 'View/alunoLogado.php';
                    }
                    if (result == '1') {
                        location.href = 'View/professorLogado.php';
                    }
                    if (result == '2') {
                        location.href = 'View/interpreteLogado.php';
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
