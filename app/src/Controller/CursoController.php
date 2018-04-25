<?php
namespace IntecPhp\Controller;
use IntecPhp\Model\CursoModel;
use IntecPhp\Model\ResponseHandler;

class CursoController
{

    function cadastrar() {

      $id ='';
      $nomeCurso = filter_input(INPUT_POST, "nomeCurso");
      $descricao = filter_input(INPUT_POST, "desc");
      $idProfessor = filter_input(INPUT_POST, "idProf");


      $curso = new CursoModel($id, $nomeCurso, $descricao, $idProfessor);

        if ($curso->getNomeCurso() != "" ) {

            $id = $curso->create();
            $rp = new ResponseHandler(200, 'Curso cadastrado com sucesso');

        } else {
            $rp = new ResponseHandler(400, 'Faltam dados!');
        }
        $rp->printJson();
    }

    public static function getCurso()
    {
        $cursos = CursoModel::getCursos($_SESSION['usuarioID']);

        if ($cursos) {
            http_response_code(200);
            echo json_encode($cursos);
        }
        else{
          http_response_code(400);
          echo 'Não foi possível carregar as categorias';
        }
    }

    public static function getAula($id)
    {
        $aulas = CursoDAO::getAula($id);

        if ($aulas) {
            http_response_code(200);
            echo json_encode($aulas);
        }
        else{
          http_response_code(400);
          echo 'Não foi possível carregar as aulas';
        }
    }
}


?>
