<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/User/UserModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class UserController extends Controller
{
  private $session;

  private $model;
  
  public function __construct()
  {
    $this->session = new Session();
    $this->session->init();
    if ($this->session->getStatus() === 1 and empty($this->session->get('email')) and $this->session->get('rol') === 1) {
     
    }elseif ($this->session->get('rol') != 1) {
      exit('Acceso denegado ');
    }

    $this->model = new UserModel();
  }

  public function exec()
  {
    $this->Listar();
  }

  public function logout()
  {
    $this->session->close();
    header('location:'.FOLDER_PATH.'/login');
  }

  public function New($message = '')
  {
    $params = array('avatar'    => $this->session->get('avatar'),
                    'nombre'    => $this->session->get('nombre'),
                    'apellido'  => $this->session->get('apellido'),
                    'email'     => $this->session->get('email'),
                    'rol'       => $this->session->get('rol'),
                    'show_form' => true, 
                    'message'   => $message);
    
    $this->render(__CLASS__, $params);
  }

  public function Listar($message = '', $message_type = 'success')
  {
    $listado = $this->model->Listar();

    $params = array('avatar'       => $this->session->get('avatar'),
                    'nombre'       => $this->session->get('nombre'),
                    'apellido'     => $this->session->get('apellido'),
                    'email'        => $this->session->get('email'),
                    'rol'          => $this->session->get('rol'),
                    'show_list'    => true,
                    'message_type' => $message_type, 
                    'message'      => $message, 
                    'listado'      => $listado);

    return $this->render(__CLASS__, $params);
  }

  public function Obtener($id)
  {
    $result = $this->model->Obtener($id);

    $info_item = !$result->num_rows
    ? $info_item = array()
    : $info_item = $result->fetch_object();

    $params = array('avatar'         => $this->session->get('avatar'),
                    'nombre'         => $this->session->get('nombre'),
                    'apellido'       => $this->session->get('apellido'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'show_edit_form' => true, 
                    'info_item'      => $info_item);

    return $this->render(__CLASS__, $params);
  }

  public function ObtenerPas($id)
  {
    $result = $this->model->Obtener($id);

    $info_item = !$result->num_rows
    ? $info_item = array()
    : $info_item = $result->fetch_object();

    $params = array('avatar'         => $this->session->get('avatar'),
                    'nombre'         => $this->session->get('nombre'),
                    'apellido'       => $this->session->get('apellido'),
                    'email'          => $this->session->get('email'),
                    'rol'            => $this->session->get('rol'), 
                    'show_edit_pass' => true, 
                    'info_item'      => $info_item);

    return $this->render(__CLASS__, $params);
  }  

  public function Agregar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->New('Son necesarios todos los campos');

    // que exista y guarda img en el servidor
    if($this->verifyimg() == true ){
      $nombre_img = $_FILES['avatar']['name'];
      $result = $this->model->Registrar($request_params,$nombre_img);
      }
    else{
      $nombre_img = 'default-img.png';
      $result = $this->model->Registrar($request_params,$nombre_img);  
      }

    if(!$result || !$this->model->affected_rows())
      return $this->New('Hubo un error al agregar el cliente');
    
    return $this->Listar('Cliente dado de alta');
  }

  private function verify($request_params)
  {
    foreach ($request_params as $param)
      if(empty($param)) return false;

    return true;
  }

  public function Eliminar($id)
  {
      if(empty($id))
        return $this->Listar('No se recibió el ID del cliente', 'warning');

      if(!is_numeric($id))
        return $this->Listar('El ID del cliente debe ser numérico', 'warning');

      $result = $this->model->Eliminar($id);

      if(!$result || !$this->model->affected_rows())
        return $this->Listar("Hubo un error al remover el cliente número {$id}", 'warning');

      $this->Listar("Cliente número {$id} removido");

  }

  public function Actualizar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->Listar('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['id']))
      return $this->Listar('El ID del cliente debe ser numérico para editar', 'warning');
    
    // que exista y guarda img en el servidor
    if($this->verifyimg() == true ){
      $nombre_img = $_FILES['avatar']['name'];
      $result = $this->model->Actualizar($request_params,$nombre_img);
      }
    else{
      $nombre_img = $_REQUEST['img_act'];
      $result = $this->model->Actualizar($request_params,$nombre_img);  
      }

    if(!$result || !$this->model->affected_rows())
      return $this->Listar("Hubo un error al editar el cliente número {$request_params['id']}", 'warning');

    $this->Listar("Cliente número {$request_params['id']} actualizado");
  }

    public function ActualizarPass($request_params)
  {
    if(!$this->verify($request_params))
      return $this->Listar('Son necesarios todos los campos para editar', 'warning');

    $result = $this->model->ActualizarPass($request_params);

    if(!is_numeric($request_params['id']))
      return $this->Listar('El ID del cliente debe ser numérico para editar', 'warning');
    
    if(!$result || !$this->model->affected_rows())
      return $this->Listar("Hubo un error al editar el cliente número {$request_params['id']}", 'warning');

    $this->Listar("Cliente número {$request_params['id']} actualizado su password");
  }

    public function verifyimg()
  {
      //recibimos los datos de la imagen

      $nombre_img = $_FILES['avatar']['name'];
      $tipo_img   = $_FILES['avatar']['type'];
      $tamano_img = $_FILES['avatar']['size'];

      if ($tamano_img <= 3000000) {
        
        if ($tipo_img == "image/jpeg" || $tipo_img == "image/jpg" || $tipo_img == "image/png") {
          // ruta de la Carpeta destino en el servidor
          $carpeta_destino = 'app/assets/img/' ;

          //Movemos la imagen del directorio temporal al directorio escogido
          move_uploaded_file ($_FILES['avatar']['tmp_name'],  $carpeta_destino. $nombre_img);
          
          return true;
        }

      }else{
        return false;
      }
  } 


}
