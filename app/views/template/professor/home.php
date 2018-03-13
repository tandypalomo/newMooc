
        <div class="row header">
          <div>
            <div class="col-md-3 text-left"> <p>MOOC ACESSICILIDADE</p> </div>

            <div class="text-right">
                <a type="button" class="btn-sair btn-lg btn-danger" id="sair" >Sair</a>
            </div>
        </div>

        <hr />

        <div class="container-fluid">
            <div  class="cursos-container">

                <div class="row">
                    <div class="col-md-2 col-sm-4 col-xs-12" id="cursos">
                        <div class="list-group vocabulary-list">
                          <h4 class="text-center">Meus cursos</h4>

                          <ul class="text-center">

                          </ul>
                          <div class="text-right">
                              <button type="button" class="btn-lg btn-info" id="cadastrar-curso" data-toggle="modal" data-target="#modalNovoCurso">Novo Curso</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-12" id="aulas">
                        <div class="list-group vocabulary-list">
                          <h4 class="text-center">Aulas</h4>
                          <ul class="text-center">

                          </ul>
                          <div class="text-right">
                              <button type="button" class="btn-lg btn-info" id="cadastrar-aula" data-toggle="modal" data-target="#modalNovaAula">Nova Aula</button>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <br>
                        <div class="text-center">
                            <h2><b>Aula</b><spam id="nome-aula"></spam></h2>
                        </div>
                        <br>
                        <figure class="vocabulary-video text-center">
                            <a href="#">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/o3jiqXwuZGE" frameborder="0" allowfullscreen></iframe>
                            </a>
                        </figure>
                        <div class="row">

                            <div class="col-md-6 col-sm-6 text-left">

                                <div class="btn-group">

                                </div>
                            </div>


                            <div class="item_introtext text-right col-md-6 col-sm-6">
                                <a class="readmore wordEvaluation"
                                   href="#"
                                   data-type="positivo"
                                   style="float:center; margin-top:0px; font-size: 20px; color: green; padding-left: 120px">
                                    <i class="glyphicon glyphicon-thumbs-up positivo"><span  id="vocabularyPlus">0</span></i>
                                </a>
                                <a class="readmore wordEvaluation"
                                   href="#"
                                   data-type="negativo"
                                   style="float:center; margin-top:0px; font-size: 20px; color: red">
                                    <i class="glyphicon glyphicon-thumbs-down negativo"> <span id="vocabularyMinus">0</span></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>

<!--Modal novo curso-->
<div id="modalNovoCurso" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">
                    <h1>Novo Curso</h1>
                </div>
            </div>
            <div class="modal-body">
                <div id="dvForm" class="text-center">
                    <ul>
                        <div style="display: none;">
                            <input class="input-lg" type="text" value='<?php echo $_SESSION["usuarioID"] ?>' id="idProfessor" />
                        </div>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Nome do Curso" id="nomeCurso" />
                        </div>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Chave de Acesso" id="chaveCurso" />
                        </div>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Descrição" id="descricao" style="min-height: 100px;"/>
                        </div>
                        <br>

                        <div class="texto" id="resultado"></div>
                    </ul>
                </div>
            </div>
            <div class="text-center modal-footer">
                <div class="text-center"><input class="btn btn-success" type="button" id="btnCadastraCurso" value="Criar"></div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL NOVA Aula -->

<div id="modalNovaAula" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">
                    <h1>Nova Aula</h1>
                </div>
            </div>
            <div class="modal-body">
                <div id="addAula" class="text-center">

                        <div style="display: none;">
                            <input class="input-lg" type="text" value='' id="idCurso" />
                        </div>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Nome da Aula" id="nomeAula" />
                        </div>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Link do Youtube" id="aulaYoutube" />
                        </div>
                        <br>
                        <br>
                        <div>
                            <input class="input-lg" type="text" placeholder="Descrição" id="descricao" style="min-height: 100px;"/>
                        </div>
                        <br>

                        <div class="texto" id="resultado"></div>

                </div>
            </div>
            <div class="text-center modal-footer">
                <div class="text-center"><input class="btn btn-success" type="button" id="btnCadastraCurso" value="Criar"></div>
            </div>
        </div>
    </div>
</div>
