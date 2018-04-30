
<div class= "row">
  <div class="col-md-8"><p>MOOC ACESSIBILIDADE</p></div>
  <div class="col-md-2 col-md-offset-2">
    <button type="button" class="btn-sair btn-lg btn-danger" id="sair" >Sair</button>
  </div>
</div>
<hr />

<div class="row" id="cursos-prof">
    <div class="col-md-6 col-sm-6 col-xs-12" v-for="curso in cursos">
        <div class="thumbnail">
            <img v-bind:src="curso.imgSrc" v-bind:alt="curso.imgAlt">
            <div class="caption">
                <h3>{{curso.nome}}</h3>
                <p>{{curso.descricao}}</p>
                <p>
                    <button class="btn btn-primary" role="button">Ver</button>
                    <button class="btn btn-danger" role="button" v-on:click="removecurso(curso.id)">Remover</button>
                </p>
            </div>
        </div>
    </div>
</div>
