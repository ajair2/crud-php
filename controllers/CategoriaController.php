<?php 
  require_once("../config/Conexion.php");
  require_once("../models/CategoriaModel.php");
  $categoria = new CategoriaModel();

  switch ($_GET["op"]) {    
    case 'combo':
      $datos = $categoria->getCategoria();
      if (is_array($datos) == true and count($datos) > 0) {
        $html = "<option label='Seleccione'></option>";
        foreach ($datos as $row) {
          $html .= "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option>";
          
        }
        echo $html;
      }
      break;
  }