<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Main/MainModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class MainController extends Controller
{
  private $session;

  private $model;

  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('email')))
      exit('Acceso denegado ');

    $this->model = new MainModel();
  }

  public function exec()
  {
    $this->show();
  }

  public function logout()
  {
    $this->session->close();
    header('location:'.FOLDER_PATH.'/login');
  }

  public function show()
  {
    $params = array('avatar'    => $this->session->get('avatar'),
                    'email'     => $this->session->get('email'),
                    'rol'       => $this->session->get('rol'),
                    'nombre'    => $this->session->get('nombre'),
                    'apellido'    => $this->session->get('apellido')
                   );
    $this->render(__CLASS__, $params); 
  }


}
