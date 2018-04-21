<?php
namespace IntecPhp\Entity;
use IntecPhp\Model\DbHandler;
class Usuario
{
  public function __construct()
    {
    }
    public static function create($nome, $email, $cpf, $senha, $tipo)
    {
      $conn = DbHandler::getInstance();

      $stm = $conn->query('insert into usuario(nome, cpf, email, senha, tipo) values(?, ?, ?, ?, ?)', [
                    $nome, $cpf, $email, $senha, $tipo
                ]);
      if($stm) {
        $id = self::exists($email);
        return $id;
      }
        return false;
    }
    public function login($email, $senha){
      $conn = DbHandler::getInstance();
      $stm = $conn->query('select * from usuario where email=? and senha=?', [ $email, $senha
                ]);
      if($u = $stm->fetch()){
        return $u;
      }
      return false;
    }
    public static function exists($email)
    {
        $conn = DbHandler::getInstance();
        $stm = $conn->query('select * from usuario where email=?', [ $email
                  ]);
        if($u = $stm->fetch()) {
            return $u['id'];
        }
        return false;
    }
}
?>
