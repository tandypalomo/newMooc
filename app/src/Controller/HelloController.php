<?php


namespace IntecPhp\Controller;


use IntecPhp\Model\DbHandler;

class HelloController
{
  function cadastrar() {

    $nome = filter_input(INPUT_POST, "txtNome");
    // $email = filter_input(INPUT_POST, "txtEmail");
    // $cpf = filter_input(INPUT_POST, "cpf");
    // $senha = filter_input(INPUT_POST, "senha");
    // $tipo = filter_input(INPUT_POST, "tipo");
    echo $nome;
    return;
      // if ($email != "" && $senha != "") {
      //
      //     return UsuarioControler->createUsuario($usuario);
      //
      // } else {
      //     return FALSE;
      // }
  }
    public static function index()
    {

        $dbh = DbHandler::getInstance();
        $stmt = $dbh->prepare('select * from start where id in(:id1, :id2)', [':id1' => 1, ':id2' => 3]);
        if($stmt) {
            while($row = $stmt->fetch()) {
                print_r($row);
            }
            exit;
        }

        return 'Hello';
    }
}
