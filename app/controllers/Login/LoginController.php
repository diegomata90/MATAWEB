<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Login controller
*/
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {
    if($this->verify($request_params))
      return $this->renderErrorMessage('El email y password son obligatorios');

    $result = $this->model->signIn($request_params['email']);

    if(!$result->num_rows)
      return $this->renderErrorMessage("El email {$request_params['email']} no fue encontrado");

    $result = $result->fetch_object();
//    var_dump($result);

    if(!password_verify($request_params['password'], $result->password))
      return $this->renderErrorMessage('La contraseña es incorrecta');

    if ($result->estado == 'I') {
      return $this->renderErrorMessage("El email {$request_params['email']} se encuentra Inactivo. Comuniquese con el administrador de la aplicación");
    }

    $this->session->init();
    $this->session->add('email', $result->email);
    $this->session->add('nombre', $result->nombre);
    $this->session->add('apellido', $result->apellido);
    $this->session->add('avatar', $result->avatar);
    $this->session->add('rol', $result->rol);

    header('location:' .FOLDER_PATH.'/main');
  }

  private function verify($request_params)
  {
    return empty($request_params['email']) OR empty($request_params['password']);
  }

  private function renderErrorMessage($message)
  {

    $params = array('error_message' => $message,
                    'message_type'  => 'danger' );

    $this->render(__CLASS__, $params);
  }

}