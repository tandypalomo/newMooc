<?php
namespace IntecPhp\Controller;
use IntecPhp\Model\Account;
use IntecPhp\Model\ResponseHandler;
class Site
{

  function cadastrar() {

    $nome = filter_input(INPUT_POST, "txtNome");
    $email = filter_input(INPUT_POST, "txtEmail");
    $cpf = filter_input(INPUT_POST, "cpf");
    $senha = filter_input(INPUT_POST, "senha");
    $tipo = filter_input(INPUT_POST, "tipo");

    if ($email != "" && $senha != "") {
      $u = new Account($nome, $email, $cpf, $senha, $tipo);
      $id = $u->create();
      $rp = new ResponseHandler(200, 'Cadastro realizado com sucesso');
    } else {
      $rp = new ResponseHandler(400, 'Faltam dados!');
    }
    $rp->printJson();
  }

  function logar() {

    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");

    if ($email != "" && $senha != "") {

      $u = new Account('', $email, '', $senha, '');
      $user = $u->login();

      if($user) {
        
        $rp = new ResponseHandler(200, 'Cadastro realizado com sucesso', ['tipo' => $u->getTipo()]);
      }

    } else {

      $rp = new ResponseHandler(400, 'Informe o email e a senha');

    }

    $rp->printJson();
  }

}
