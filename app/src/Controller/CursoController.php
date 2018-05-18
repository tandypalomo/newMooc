<?php
namespace IntecPhp\Controller;
use IntecPhp\Model\CursoModel;
use IntecPhp\Model\AulaModel;
use IntecPhp\Model\ResponseHandler;
use IntecPhp\Entity\Curso;
use IntecPhp\Entity\UsuarioXCurso;
use IntecPhp\Entity\Aula;

class CursoController
{

    function cadastrarCurso() {
      session_start();
      $id ='';
      $nomeCurso = filter_input(INPUT_POST, "nomeCurso");
      $descricao = filter_input(INPUT_POST, "desc");
      $youTube = filter_input(INPUT_POST, "youTube");
      $idProfessor = $_SESSION["userId"];

      $yT = explode('=', $youTube);
      if($yT[0] == 'https://www.youtube.com/watch?v'){

        $youTube = 'https://www.youtube.com/embed/' . $yT[1];
      }

      $curso = new CursoModel($id, $nomeCurso, $descricao, $youTube, $idProfessor);

        if ($curso->getNomeCurso() != "" ) {

            $id = $curso->create();

            if($id){
              $aula = new AulaModel('', 'Aula Introdutória', $youTube, '', $id);
              $idAula = $aula->create();
              $rp = new ResponseHandler(200, 'Curso cadastrado com sucesso');
            } else {
              $rp = new ResponseHandler(400, 'Ocorreu um erro!');
            }

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
          $rp = new ResponseHandler(200, 'ok',  $cursos);
      } else {
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
    }

    public static function getAllCurso()
    {

      $cursos = CursoModel::getAllCurso();

      if ($cursos) {
          $rp = new ResponseHandler(200, 'ok',  $cursos);
      } else {
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
    }

    public static function deleteCurso()
    {
      $id = filter_input(INPUT_POST, 'id');

      $cursos = Curso::deleteCurso($id);

      if ($cursos > 0) {
          $rp = new ResponseHandler(200, 'Excluido com sucesso!');
      } else {
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
    }

    function removeCursoAluno()
    {
      session_start();

      $idUser = $_SESSION['userId'];
      $idCurso = filter_input(INPUT_POST, 'id');

      $curso = UsuarioXCurso::removeCursoAluno($idUser, $idCurso);

      if ($curso > 0) {
          $rp = new ResponseHandler(200, 'Excluido com sucesso!');
      } else {
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
    }
    // AULA
    function cadastrarAula() {
      session_start();
      $id ='';
      $nomeAula = filter_input(INPUT_POST, "nomeAula");
      $youTube = filter_input(INPUT_POST, "aulaYoutube");
      $descricao = filter_input(INPUT_POST, "descricao");
      $idCurso = filter_input(INPUT_POST, "idCurso");

      $aula = new AulaModel($id, $nomeAula, $youTube, $descricao, $idCurso);

      if ($aula->getNomeAula() != "" ) {

          $id = $aula->create();
          $rp = new ResponseHandler(200, 'Aula cadastrada com sucesso');

      } else {
          $rp = new ResponseHandler(400, 'Faltam dados!');
      }
      $rp->printJson();
    }

    public static function getAula( )
    {
        $idCurso = filter_input(INPUT_POST, "id");
        $aulas = Aula::getAula($idCurso);

        if ($aulas) {
          $rp = new ResponseHandler(200, 'ok',  $aulas);
        }
        else{
          $rp = new ResponseHandler(400, 'Faltam dados!');
        }

        $rp->printJson();
    }

    public static function incricaoCurso( )
    {
      session_start();
      $idCurso = filter_input(INPUT_POST, "id");
      $userId = $_SESSION['userId'];

      $curso = UsuarioXCurso::incricaoCurso($userId, $idCurso);

      if ($curso > 0) {
        $rp = new ResponseHandler(200, 'ok');
      }
      else{
        $rp = new ResponseHandler(400, 'Faltam dados!');
      }

      $rp->printJson();

    }
    public static function enviaLibras( )
    {
      $idAula = filter_input(INPUT_POST, "id");
      $youTube = filter_input(INPUT_POST, "video");

      $yT = explode('=', $youTube);
      if($yT[0] == 'https://www.youtube.com/watch?v'){

        $youTube = 'https://www.youtube.com/embed/' . $yT[1];
      }
      
      $aula = Aula::cadastraVideoLibras($idAula, $youTube);

      if ($aula > 0) {
        $rp = new ResponseHandler(200, 'ok');
      }
      else{
        $rp = new ResponseHandler(400, 'Faltam dados!');
      }

      $rp->printJson();
    }
    public static function getCursoAluno( )
    {
      session_start();
      $userId = $_SESSION['userId'];

      $cursos = Curso::getCursoAluno($userId);

      if ($cursos) {
          $rp = new ResponseHandler(200, 'ok',  $cursos);
      } else {
        $rp = new ResponseHandler(400, 'Não foi possivel');
      }

      $rp->printJson();
    }

}


?>
