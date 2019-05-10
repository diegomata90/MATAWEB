<?php 
/**
* 
*/
class VaryModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function affected_rows()
  {
    return $this->db->affected_rows;
  }

  public function Registrar($params)
  {
    try {
        $codigo       = $this->db->real_escape_string($params['codigo']);
        $descripcion  = $this->db->real_escape_string($params['descripcion']);
        $presentacion = $this->db->real_escape_string($params['presentacion']);
        $acprec01     = $this->db->real_escape_string($params['acprec01']);
        $newprec01    = $this->db->real_escape_string($params['newprec01']);
        $variacion    = $this->db->real_escape_string($params['variacion']);
        $porcvar      = $this->db->real_escape_string($params['porcvar']);
        $fecha_comun  = $this->db->real_escape_string($params['fecha_comun']);
        $tipo         = $this->db->real_escape_string($params['tipo']);
        $clase        = $this->db->real_escape_string($params['clase']);

        $sql = "INSERT INTO variar (codigo, descripcion, presentacion,acprec01,newprec01,variacion,porcvar,fecha_comun,tipo,clase) VALUES ('$codigo', '$descripcion', '$presentacion','$acprec01','$newprec01', '$variacion', '$porcvar', '$fecha_comun', '$tipo', '$clase')";

          return $this->db->query($sql);
    } 
    catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar()
  {
    try {
        $mesactual  = date("m");
        $anioactual = date("Y");

        $sql = "SELECT * FROM variar where MONTH(fecha_comun)='$mesactual' and YEAR(fecha_comun)='$anioactual' order by fecha_comun DESC ";
        return $this->db->query($sql);
    } 
    catch (Exception $e) {
       die($e->getMessage());     
    }
  }

  public function Obtener($id)
  {
    try {
        $sql = "SELECT * FROM variar WHERE id='{$id}'";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());       
    }

  }

  public function Eliminar($id)
  {
    try {
        $sql = "DELETE FROM variar WHERE id={$id}";
        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }

  public function Actualizar($params)
  {
    try {
        $codigo       = $this->db->real_escape_string($params['codigo']);
        $descripcion  = $this->db->real_escape_string($params['descripcion']);
        $presentacion = $this->db->real_escape_string($params['presentacion']);
        $acprec01     = $this->db->real_escape_string($params['acprec01']);
        $newprec01    = $this->db->real_escape_string($params['newprec01']);
        $variacion    = $this->db->real_escape_string($params['variacion']);
        $porcvar      = $this->db->real_escape_string($params['porcvar']);
        $fecha_comun  = $this->db->real_escape_string($params['fecha_comun']);
        $tipo         = $this->db->real_escape_string($params['tipo']);
        $clase        = $this->db->real_escape_string($params['clase']);

        $id = $this->db->real_escape_string($params['id']);
        
        $sql = "UPDATE variar SET 
            codigo       = '{$codigo}', 
            descripcion  = '{$descripcion}',
            presentacion = '{$presentacion}',
            acprec01     = '{$acprec01}', 
            newprec01    = '{$newprec01}', 
            variacion    = '{$variacion}',             
            porcvar      = '{$porcvar}',
            fecha_comun  = '{$fecha_comun}',
            tipo         = '{$tipo}',
            clase        = '{$clase}'
            WHERE id     =  {$id}";
      
      return $this->db->query($sql);       
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }
  
  public function Buscar($codigo, $descripcion, $desde, $hasta)
  {
    try {
        $mesactual  = date("m");
        $anioactual = date("Y");

        if ($codigo != '' AND $descripcion != '' AND $desde != '' AND $hasta != ''  ) {
          $sql = ("SELECT * FROM variar where codigo = $codigo AND descripcion like '%$descripcion%' AND fecha_comun between '$desde' and '$hasta' order by fecha_comun DESC ");
        }
        elseif ($codigo != '' AND $desde != '' AND $hasta != ''  ) {
          $sql = ("SELECT * FROM variar where codigo = $codigo AND fecha_comun between '$desde' and '$hasta' order by fecha_comun DESC ");
        }
        elseif ($codigo != '' AND $descripcion != '' ) {
          $sql = ("SELECT * FROM variar where codigo = $codigo AND descripcion like '%$descripcion%' order by fecha_comun DESC ");
        }
        elseif ($codigo != '') {
          $sql = ("SELECT * FROM variar where codigo = $codigo order by fecha_comun DESC ");
        }
        elseif ($descripcion != '') {
          $sql = ("SELECT * FROM variar where descripcion like '%$descripcion%' order by fecha_comun DESC ");
        }
        elseif ($desde != '' and $hasta != '') {
          $sql = ("SELECT * FROM variar where fecha_comun between '$desde' and '$hasta' order by fecha_comun DESC ");
        }
        else{
          $sql = ("SELECT * FROM variar where YEAR(fecha_comun)='0000-00-00' order by fecha_comun DESC ");     
        }

        return $this->db->query($sql);      
    } 
    catch (Exception $e) {
        die($e->getMessage());        
    }

  }  
}