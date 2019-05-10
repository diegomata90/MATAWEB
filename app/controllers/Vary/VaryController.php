<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once ROOT . FOLDER_PATH .'/app/models/Vary/VaryModel.php';
require_once LIBS_ROUTE .'Session.php';

/**
* Main controller
*/
class VaryController extends Controller
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

    $this->model = new VaryModel();
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

  public function Agregar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->New('Son necesarios todos los campos');

      $result = $this->model->Registrar($request_params);  

    if(!$result || !$this->model->affected_rows())
      return $this->New('Hubo un error al agregar el Variación');
    
    return $this->Listar('Variación agregada correctamente');
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
        return $this->Listar('No se recibió el ID del variación', 'warning');

      if(!is_numeric($id))
        return $this->Listar('El ID del variación debe ser numérico', 'warning');

      $result = $this->model->Eliminar($id);

      if(!$result || !$this->model->affected_rows())
        return $this->Listar("Hubo un error al remover la variación número {$id}", 'warning');

      $this->Listar("Variación número {$id} removido");

  }

  public function Actualizar($request_params)
  {
    if(!$this->verify($request_params))
      return $this->Listar('Son necesarios todos los campos para editar', 'warning');

    if(!is_numeric($request_params['id']))
      return $this->Listar('El ID del variación debe ser numérico para editar', 'warning');
    
      $result = $this->model->Actualizar($request_params);  

    if(!$result || !$this->model->affected_rows())
      return $this->Listar("Hubo un error al editar el variación número {$request_params['id']}", 'warning');

    $this->Listar("Variación número {$request_params['id']} actualizado");
  }

  public function Buscar()
  {
    $message = ''; 
    $message_type = 'success';
    $listado ='';

    if(isset($_REQUEST['buscar'])){
      if (!empty($_REQUEST['codigo']) or !empty($_REQUEST['descripcion']) or !empty($_REQUEST['desde']) and !empty($_REQUEST['hasta'])) {
          $listado = $this->model->Buscar($_REQUEST['codigo'],$_REQUEST['descripcion'],$_REQUEST['desde'],$_REQUEST['hasta']);
          if(!$listado || !$this->model->affected_rows()){
            $message = "No se contro la variación del código {$_REQUEST['codigo']}";
            $message_type = 'warning';      
            }
    }else{
      $message = 'Debe ingresar un valor';
      $message_type = 'danger';
      $listado = $this->model->Buscar('','','','');
      }            
    } 
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

  public function Guardar_excel()
  {
    if(isset($_POST["enviar"])){

      //obtenemos el archivo .csv
      $tipo = $_FILES['archivo']['type'];
             
      $tamanio = $_FILES['archivo']['size'];
             
      $archivotmp = $_FILES['archivo']['tmp_name'];
             
      //cargamos el archivo
      $lineas = file($archivotmp);
             
      //inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
      $i=0;
        
      //Recorremos el bucle para leer línea por línea
      foreach ($lineas as $linea_num => $linea)
      { 
        //abrimos bucle
        /*si es diferente a 0 significa que no se encuentra en la primera línea 
        (con los títulos de las columnas) y por lo tanto puede leerla*/
        if($i != 0) 
          { 
            //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
            /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
            leyendo hasta que encuentre un ; */
            $datos = explode(",",$linea);
             
            //Almacenamos los datos que vamos leyendo en una variable
            //usamos la función utf8_encode para leer correctamente los caracteres especiales
            $descrip=  str_replace('"', '', $datos[1]);

            $request_params = [
                              'codigo'        => $datos[0],
                              'descripcion'   => $descrip,
                              'presentacion'  => $datos[2],
                              'acprec01'      => $datos[3],
                              'newprec01'     => $datos[4],
                              'variacion'     => $datos[5],
                              'porcvar'       => $datos[6],
                              'fecha_comun'   => $datos[7],
                              'tipo'          => $datos[8],
                              'clase'         => $datos[9]
            ];

            //var_dump($request_params);
                    
            $this->model->Registrar($request_params);
            //cerramos condición
          }
             
            /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
            entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
            $i++;
            //cerramos bucle
      }
    $i= $i-1;     
    return $this->Listar("$i Variaciones agregadas correctamente");    
    }  
    return $this->Listar('');
  }

  public function bajarexcel()
  {
      header("Content-type: application/vnd.ms-excel");
      $filename = "Variacion_MFA_".date('Ymd') . ".xls";
      header("Content-Disposition: attachment; filename=$filename");
      header("Pragma: no-cache");
      header("Expires: 0");    
        
      require 'app/views/vary/reporte-vary-excel.php';
    }  
}
