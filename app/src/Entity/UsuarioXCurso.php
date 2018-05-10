<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;

class UsuarioXCurso {

  function incricaoCurso($idUser, $idCurso)
  {
    $conn = DbHandler::getInstance();

    $stm = $conn->query('insert into usuario_x_curso(idUsuario, idCurso) values(?, ?)', [
                  $idUser, $idCurso
              ]);

    if($stm){

      return $stm->rowCount();

    }
    return -1;

  }


}
