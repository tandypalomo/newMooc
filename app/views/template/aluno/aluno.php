
<div class= "row">
  <div class="col-md-4 col-xs-4"><p>MOOC ACESSIBILIDADE</p></div>
  <div class="col-md-2 col-md-offset-2 col-xs-4">
    <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modal-novos-cursos">Todos Cursos</button>
  </div>
  <div class="col-md-1 col-md-offset-3 col-xs-4">
    <button type="button" class="btn btn-lg btn-danger" id="sair" >Sair</button>
  </div>
</div>
<hr />
<h2 class="text-center">Meus Cursos</h2>
<div class="row" id="cursos-prof">
    <div class="col-md-4 col-sm-6 col-xs-12 text-center" v-for="curso in cursos">
        <div class="thumbnail">
            <img v-bind:src="curso.imgSrc" v-bind:alt="curso.imgAlt">
            <div class="caption">
                <h3>{{curso.nome}}</h3>
                <iframe v-bind:src="curso.video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <p>{{curso.descricao}}</p>
                <p>
                    <button class="btn btn-info" role="button" v-on:click="seecurso(curso.id)">Ver</button>
                    <button class="btn btn-danger" role="button" v-on:click="removecurso(curso.id)">Desinscrever</button>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Modal AULAS -->
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
                                 <button class="btn btn-primary" role="button" v-on:click="seeaula(aula.nome, aula.video, aula.videoLibras)">Ver</button>
                             </p>
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

<!-- Modal Novos Cursos -->
<div id="modal-novos-cursos" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">

       <!-- Modal content-->
       <div class="modal-content">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <div class="text-center">

                   <h1>Novos Cursos</h1>
               </div>
           </div>

           <div class="col-md-12 text-center">
             <hr>
             <div class="row" id="todos-cursos">
                 <div class="col-md-6 col-sm-6 col-xs-12 text-center" v-for="todo in todos">
                     <div class="thumbnail">

                         <div class="caption">
                             <h3>{{todo.nome}}</h3>
                             <iframe v-bind:src="todo.video" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                             <p>{{todo.descricao}}</p>
                             <p>
                                 <button class="btn btn-primary" role="button" v-on:click="inscrever(todo.id)">Inscrever</button>
                             </p>
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
                        <button class="btn btn-success" id="play-videos">Play</button>
                         <div class="caption">
                             <iframe id="srcAula" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                         </div>
                              <iframe id="srcAulaLibras" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                     </div>
                 </div>
             </div>

           </div>
           <div class="modal-footer">

           </div>
       </div>
   </div>
</div>
