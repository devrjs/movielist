<?php

require_once 'Model/UsuarioModel.php';
require_once 'DAO/UsuarioDAO.php';

class UsuarioController
{
    private $usuarioDAO;

    public function __construct() {
      $this->usuarioDAO = new UsuarioDAO();
    }
  
    public static function index() {
      include 'View/modules/loginUsuario.php';
    }

    public static function cadastro() {
      include 'View/modules/signup.php';
    }

    public static function forgot() {
      include 'View/modules/forgot.php';
    }


    public static function cadastroAction(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obter os dados do formulário
        $nome_completo = $_POST['nome_completo'];

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Crie um objeto do seu modelo de usuário
        $usuarioDAO = new UsuarioDAO();
    
        // Chame a função insertUser() para inserir o novo usuário no banco de dados
        $usuarioDAO->insertUser($nome_completo, $email, $password);
    

        header('Location: ./');
    }
  }  

  
  public static function login()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Obter os dados do formulário
          $email = $_POST['email'];
          $password = $_POST['password'];
  
          // Crie um objeto do seu modelo de usuário
          $usuarioDAO = new UsuarioDAO();
  
          // Verificar se o email e a senha estão corretos
          $usuario = $usuarioDAO->getUserByEmail($email);
          if ($usuario && password_verify($password, $usuario['password'])) {
              // Iniciar a sessão e armazenar informações do usuário
              session_start();
              $_SESSION['usuario_id'] = $usuario['id'];
              $_SESSION['usuario_nome'] = $usuario['nome_completo'];
              $_SESSION['usuario_email'] = $usuario['email'];
  
              // Redirecionar para a página de sucesso ou exibir uma mensagem de sucesso
              // header('Location: pagina_sucesso.php');
              header('Location: ./filmes');
          } else {
              // Redirecionar para a página de erro ou exibir uma mensagem de erro
              // header('Location: pagina_erro.php');
              header('Location: ./filmes');
          }
      }
  }
  /*
  public function login($email, $password)
  {
      // Verificar se o email e a senha estão corretos
      $usuario = $this->usuarioDAO->getUserByEmail($email);
      if ($usuario && password_verify($password, $usuario->getPassword())) {
          // Iniciar a sessão e armazenar informações do usuário
          session_start();
          $_SESSION['usuario_id'] = $usuario->getId();
          $_SESSION['usuario_nome'] = $usuario->getNomeCompleto();
          $_SESSION['usuario_email'] = $usuario->getEmail();

          // Redirecionar para a página de sucesso ou exibir uma mensagem de sucesso
          // header('Location: pagina_sucesso.php');
          header('Location: ../filmes');
      } else {
          // Redirecionar para a página de erro ou exibir uma mensagem de erro
          // header('Location: pagina_erro.php');
          header('Location: ../login');
      }
  }*/

  
    public static function forgotPassword() {
      $email = $_POST['email'];
    
      // Verifica se o email existe no banco de dados
      $usuario = $this->usuarioModel->getUserByEmail($email);
    
      if ($usuario) {
        // Gere uma nova senha aleatória
        $newPassword = substr(md5(uniqid(mt_rand(), true)), 0, 8);
    
        // Atualize a senha do usuário no banco de dados
        $this->usuarioDAO->updatePassword($usuario['id'], $newPassword);
    
        // Envie um email com a nova senha para o usuário (implementação não inclusa aqui)
    
        echo "Sua nova senha foi enviada para o seu email.";
      } else {
        echo "Email não encontrado.";
      }
    }

  }