<?php


namespace IntecPhp\Model;
use Intec\Session\Session;
use IntecPhp\Entity\Curso;


class CursoModel
{
  private $id;
  private $nomeCurso;
  private $descricao;
  private $idProfessor;

  public function __construct($id = '', $nomeCurso, $descricao, $idProfessor)
    {
        $this->id = $id;
        $this->nomeCurso = $nomeCurso;
        $this->descricao = $descricao;
        $this->idProfessor = $idProfessor;
    }

    public function getCursoUserId($uId) {
      return Curso::getCursoUserId($uId);
    }

    public function create()
    {
      $cId = Curso::createCurso($this->nomeCurso, $this->descricao, $this->idProfessor);
    }


    public function getNomeCurso()
    {
        return $this->nomeCurso;
    }

}
