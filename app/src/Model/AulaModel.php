<?php


namespace IntecPhp\Model;
use Intec\Session\Session;
use IntecPhp\Entity\Aula;


class AulaModel
{
  private $id;
  private $nomeAula;
  private $youTube;
  private $descricao;
  private $idProfessor;

  public function __construct($id = '', $nomeAula, $youTube, $descricao, $idProfessor)
    {
      $this->id = $id;
      $this->nomeAula = $nomeAula;
      $this->youTube = $youTube;
      $this->descricao = $descricao;
      $this->idProfessor = $idProfessor;
    }

    // public function getCursoUserId($uId) {
    //   return Aula::getCursoUserId($uId);
    // }

    public function create()
    {
      return Aula::createAula($this->nomeAula, $this->youTube, $this->descricao, $this->idProfessor);
    }


    public function getNomeAula()
    {
        return $this->nomeAula;
    }

}
