<?php
namespace IntecPhp\Controller;
use IntecPhp\Model\CursoModel;
use IntecPhp\Model\ResponseHandler;

class CursoController
{

    function cadastrar() {
      session_start();
      $id ='';
      $nomeCurso = filter_input(INPUT_POST, "nomeCurso");
      $descricao = filter_input(INPUT_POST, "desc");
      $idProfessor = $_SESSION["userId"];

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
      session_start();

      $cursos = CursoModel::getCursoUserId($_SESSION['userId']);

      if ($cursos) {
          $rp = new ResponseHandler(200, 'ok', ['cursos' => $cursos]);
      }
      else{
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
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
