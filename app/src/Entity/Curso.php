<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;

class Curso {

  public function __construct()
  {

  }

    function createCurso($nomeCurso, $descricao, $idProfessor) {

      $conn = DbHandler::getInstance();

      $stm = $conn->query("insert into curso (nome, descricao, idProfessor) values (?, ?, ?)", [
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
        if($c = $stm->fetch()) {
            return $c['id'];
        }
        return false;
    }

    public static function getCursoUserId($uId)
    {
      $conn = DbHandler::getInstance();

      $stm = $conn->query('select * from curso where idProfessor=?', [ $uId
                ]);

      if($stm) {
        $c = $stm->fetchAll();
        return $c;

      }
      return false;
    }

}
