<?php 
  require_once("../config/Conexion.php");
  require_once("../models/ProductoModel.php");
  $producto = new ProductoModel();

  switch ($_GET["op"]) {
    case 'listar':
      $datos = $producto->getProducto();
      $data = Array();
      foreach ($datos as $row) {
        $sub_array = array();
        $sub_array[] = $row["prod_name"]; # Va el nombre de la db
        $sub_array[] = '<button type="button" onclick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>';
        $sub_array[] = '<button type="button" onclick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>';
        $data[] = $sub_array;
      }

      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData" => $data
      );
      echo json_encode($results);

      break;

  }