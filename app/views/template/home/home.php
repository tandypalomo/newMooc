<div class= "row">
  <div class="col-lg-8"><p>MOOC ACESSIBILIDADE</p></div>
  <div class="col-lg-2 col-lg-offset-2">
      <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modalLogin">Login</button>
      <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button>
  </div>
</div>

  <div class="col-md-8 col-md-offset-2">
    <img src="img/logo.jpg">
  </div>


<!-- Modal Login-->
<div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">
                    <h1>Login</h1>
                </div>
            </div>
            <div class="modal-body">

                <div id="dvForm" class="col-md-12 text-center">
                  <div>
                    <input class="input-lg" type="text" placeholder="Email" id="emailLogin" />
                  </div>
                  <br>
                  <div>
                    <input class="input-lg" type="password" placeholder="Senha" id="senhaLogin" />
                  </div>
                  <br>
                </div>

            </div>

            <div class="modal-footer">
              <div class=" col-md-12 text-center">
                <button class="btn btn-primary btn-lg" type="button" id="btnLogin">Login</button>
              </div>
            </div>

        </div>
    </div>
</div>

<!--Modal cadastro-->
<div id="modalCadastro" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">

                    <h1>Cadastro Usuário</h1>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <br>
                <div class="form-group-lg col-md-12 col-lg-12 col-sm-9 col-xs-12">

                    <div>
                        <input class="input-lg" type="text" placeholder="Nome" required="" id="txtNome" />
                    </div>
                    <br>
                    <div>
                        <input class="input-lg" type="text" placeholder="Email" required="" id="txtEmail" />
                    </div>
                    <br>
                    <div>
                        <input class="input-lg" type="text" placeholder="CPF" required="" id="cpf" />
                    </div>
                    <br>
                    <div>
                        <input class="input-lg" type="password" placeholder="Senha" required="" id="senha" />
                    </div>
                    <br>
                    <div>
                        <select class="input-lg" name="tipo" id="tipo">
                            <option value="0" selected>Aluno</option>
                            <option value="1">Professor</option>
                            <option value="2">Interprete</option>
                        </select>
                    </div>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                  <button class="btn btn-primary btn-lg" type="button" id="btnCadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
