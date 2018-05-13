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

  function removeCursoAluno($idUser, $idCurso){
    $conn = DbHandler::getInstance();

    $stm = $conn->query('delete from usuario_x_curso where idUsuario = ? and idCurso = ?', [$idUser, $idCurso]);

    if($stm){
      return $stm->rowCount();
    }

    return -1;
    
  }


}
