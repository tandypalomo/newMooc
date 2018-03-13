<?php


namespace IntecPhp\Model;
use Intec\Session\Session;
use IntecPhp\Entity\Usuario;


class Account
{
  private $nome;
  private $email;
  private $cpf;
  private $senha;
  private $tipo;

  public function __construct($nome, $email, $cpf, $senha, $tipo)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    public function create()
    {
      $uId = Usuario::create($this->nome, $this->email, $this->cpf, $this->senha, $this->tipo);
    }

    public function login()
    {
      $u = Usuario::login($this->email, $this->senha);

      $this->nome = $u['nome'];
      $this->cpf = $u['cpf'];
      $this->tipo = $u['tipo'];
      die($this->tipo);
      if($this->tipo == 0){

        $session = Session::getInstance();
        $session->set('id', $u['id']);
        return $u;
      }
      return false;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

	public static function getCurrentUserId() {
		$session = Session::getInstance();
		return $session->get('id');
	}

    public static function isLoggedIn()
    {
        $session = Session::getInstance();
        return $session->exists('id');
    }

    public static function logout()
    {
        $session = Session::getInstance();
        $session->unset('id');
    }



}
