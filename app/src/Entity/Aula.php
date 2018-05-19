<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;

class Aula {

  public function __construct()
  {

  }

    function createAula($nomeAula, $youTube, $descricao, $idCurso) {

      $conn = DbHandler::getInstance();

      $stm = $conn->query("insert into aula (nome, video, descricao, idCurso) values (?, ?, ?, ?)", [
          $nomeAula, $youTube, $descricao, $idCurso
      ]);

      if($stm) {
        $id = self::lastByCursoId($idCurso);
        return $id;
      }

      return false;

    }

    public static function excluiAula($idAula){

      $conn = DbHandler::getInstance();

      $stm = $conn->query('delete from aula where id=?', [ $idAula
                ]);

      if($stm) {
        return $stm->rowCount();
      }
      return -1;
    }

    public static function cadastraVideoLibras($idAula, $video){
      $conn = DbHandler::getInstance();

      $stm = $conn->query("update aula set videoLibras = ? where id = ?", [
          $video, $idAula
      ]);

      if($stm) {
        return $stm->rowCount();
      }
      return -1;
    }

    public static function lastByCursoId($idCurso)
    {
        $conn = DbHandler::getInstance();
        $stm = $conn->query('select * from aula where idCurso=? ORDER BY id DESC LIMIT 1', [ $idCurso
                  ]);
        if($a = $stm->fetch()) {
            return $a['id'];
        }
        return false;
    }

    public static function getAula($idCurso)
    {
        $conn = DbHandler::getInstance();
        $stm = $conn->query('select * from aula where idCurso=?', [ $idCurso
                  ]);

        if($a = $stm->fetchAll()) {
            return $a;
        }
        return false;
    }


}
