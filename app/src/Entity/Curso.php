<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;

class Curso {

  public function __construct()
  {

  }

    function createCurso($nomeCurso, $descricao, $idProfessor) {

      $conn = DbHandler::getInstance();

      $stm = $conn->query("insert into curso (nomeCurso, descricao, idProfessor) values (?, ?, ?)", [
          $nomeCurso, $descricao, $idProfessor
      ]);

      if($stm) {
        $id = self::lastByProfId($idProfessor);
        return $id;
      }

      return false;

    }

    public static function lastByProfId($idProf)
    {
        $conn = DbHandler::getInstance();
        $stm = $conn->query('select * from curso where idProfessor=? ORDER BY id DESC LIMIT 1', [ $idProf
                  ]);
        if($u = $stm->fetch()) {
            return $u['id'];
        }
        return false;
    }

    public static function getCursos()
    {
        // session_start();
        $conn = new mysqli('localhost', 'root', 'root', 'mooc');

        $sql = "select * from curso where idProfessor = " . $_SESSION['usuarioID']  ;

        $re = $conn->query($sql);

        if (!$re) {

            return false;
        }

        $cursos = [];
        while ($row = $re->fetch_assoc()) {
            $cursos[] = $row;
        }

        return $cursos;
    }

}
