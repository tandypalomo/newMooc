
<div class= "row">
  <div class="col-md-4 col-xs-4"><p>MOOC ACESSIBILIDADE</p></div>
  <div class="col-md-2 col-md-offset-2 col-xs-4">
    <button type="button" class="btn-lg btn-info" data-toggle="modal" data-target="#modal-cadastro-curso">Novo Curso</button>
  </div>
  <div class="col-md-1 col-md-offset-3 col-xs-4">
    <button type="button" class="btn-lg btn-danger" id="sair" >Sair</button>
  </div>
</div>
<hr />

<div class="row" id="cursos-prof">
    <div class="col-md-4 col-sm-6 col-xs-12 text-center" v-for="curso in cursos">
        <div class="thumbnail">
            <img v-bind:src="curso.imgSrc" v-bind:alt="curso.imgAlt">
            <div class="caption">
                <h3>{{curso.nome}}</h3>
                <iframe v-bind:src="curso.video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <p>{{curso.descricao}}</p>
                <p>
                    <button class="btn btn-primary" role="button" v-on:click="seecurso(curso.id)">Ver</button>
                    <button class="btn btn-danger" role="button" v-on:click="removecurso(curso.id)">Remover</button>
                </p>
            </div>
        </div>
    </div>
</div>


 <!-- Modal CADASTRO CURSO -->
<div id="modal-cadastro-curso" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="text-center">

                    <h1>Novo Curso</h1>
                </div>
            </div>

            <div class="col-md-12 text-center">
                <br>
                <div class="form-group-lg col-md-12 col-lg-12 col-sm-9 col-xs-12">

                    <div>
                        <input class="input-lg" type="text" placeholder="Nome" required="" id="nomeCurso" />
                    </div>
                    <br>
                    <div>
                        <input class="input-lg" type="text" placeholder="Video de Apresentação" required="" id="youTube" />
                    </div>
                    <br>
                    <div>
                        <input class="input-lg" type="text" placeholder="Descrição" required="" id="descricao" />
                    </div>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                  <button class="btn-primary btn-lg" type="button" id="btnCadastrar">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AULAS -->

<!-- Modal CADASTRO CURSO -->
<div id="modal-aulas" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

       <!-- Modal content-->
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <div class="text-center">

                   <h1>Aulas</h1>
               </div>
           </div>

           <div class="col-md-12 text-center">
             <hr>
             <div class="row" id="aula-curso">
                 <div class="col-md-6 col-sm-6 col-xs-12 text-center" v-for="aula in aulas">
                     <div class="thumbnail">

                         <div class="caption">
                             <h3>{{aula.nome}}</h3>
                             <iframe v-bind:src="aula.video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                             <p>{{aula.descricao}}</p>
                             <p>
                                 <button class="btn btn-primary" role="button" v-on:click="seeaula(aula.nome, aula.video)">Ver</button>
                                 <button class="btn btn-danger" role="button" v-on:click="removeaula(aula.id)">Remover</button>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>

           </div>
           <div class="modal-footer">
             <div class="col-md-12 col-xs-12 text-center">
               <button type="button" class="btn-lg btn-info" data-toggle="modal" data-target="#modal-cadastro-curso">Novo Aula</button>
             </div>
           </div>
       </div>
   </div>
</div>

<!-- Modal AULA -->
<div id="modal-aula" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

       <!-- Modal content-->
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <div class="text-center">

                   <h1><span id="nome-aula"></span></h1>
               </div>
           </div>

           <div class="col-md-12 text-center">
             <hr>
             <div class="row" id="aula-curso">
                 <div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12 text-center" v-for="aula in aulas">
                     <div class="thumbnail">

                         <div class="caption">
                             <iframe id="srcAula" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                         </div>
                     </div>
                 </div>
             </div>

           </div>
           <div class="modal-footer">

           </div>
       </div>
   </div>
</div>
