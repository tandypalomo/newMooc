<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;

class Curso {

  public function __construct()
  {

  }

    function createCurso($nomeCurso, $descricao, $youTube, $idProfessor) {

      $conn = DbHandler::getInstance();

      $stm = $conn->query("insert into curso (nome, descricao, video, idProfessor) values (?, ?, ?, ?)", [
          $nomeCurso, $descricao, $youTube, $idProfessor
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

    public static function getAllCurso()
    {
      $conn = DbHandler::getInstance();

      $stm = $conn->query('select * from curso');

      if($stm) {
        $c = $stm->fetchAll();
        return $c;

      }
      return false;
    }

    public static function deleteCurso($id)
    {
      $conn = DbHandler::getInstance();

      $stm = $conn->query('delete from curso where id=?', [ $id
                ]);

      if($stm) {

        return $stm->rowCount();

      }
      return -1;
    }

}
