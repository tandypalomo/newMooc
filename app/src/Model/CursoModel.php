<?php


namespace IntecPhp\Model;
use Intec\Session\Session;
use IntecPhp\Entity\Curso;


class CursoModel
{
  private $id;
  private $nomeCurso;
  private $descricao;
  private $youTube;
  private $idProfessor;

  public function __construct($id = '', $nomeCurso, $descricao, $youTube, $idProfessor)
    {
        $this->id = $id;
        $this->nomeCurso = $nomeCurso;
        $this->descricao = $descricao;
        $this->youTube = $youTube;
        $this->idProfessor = $idProfessor;
    }

    public function getCursoUserId($uId) {
      return Curso::getCursoUserId($uId);
    }

    public function getAllCurso() {
      return Curso::getAllCurso();
    }

    public function create()
    {
      return Curso::createCurso($this->nomeCurso, $this->descricao, $this->youTube, $this->idProfessor);
    }


    public function getNomeCurso()
    {
        return $this->nomeCurso;
    }

}
