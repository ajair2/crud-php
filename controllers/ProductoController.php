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
        $sub_array[] = $row["cat_name"]; # Va el nombre de la db
        $sub_array[] = $row["prod_name"]; # Va el nombre de la db
        $sub_array[] = $row["prod_desc"]; # Va el nombre de la db
        $sub_array[] = $row["prod_cantidad"]; # Va el nombre de la db
        $sub_array[] = '<button type="button" onclick="editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>';
        $sub_array[] = '<button type="button" onclick="eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>';
        $data[] = $sub_array;
      }

      # estructura de datatables.js
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData" => $data
      );
      echo json_encode($results);
      break;

    case 'guardaryeditar':
      $datos = $producto->getProductoXId((int) $_POST["prod_id"]);

      if (empty($_POST["prod_id"])) {
        if (is_array($datos) == true and count($datos) == 0) {
          $producto->insertProducto($_POST["cat_id"], $_POST["prod_name"], $_POST["prod_desc"], $_POST["prod_cantidad"]);
        }
      } else {
        $producto->updateProducto($_POST["prod_id"], $_POST["cat_id"], $_POST["prod_name"], $_POST["prod_desc"], $_POST["prod_cantidad"]);

      }
      break;

    case 'mostrar':
      $datos = $producto->getProductoXId($_POST["prod_id"]);

      if (is_array($datos) == true and count($datos) > 0) {
        foreach($datos as $row) {
          $outout["prod_id"] = $row["prod_id"];
          $outout["cat_id"] = $row["cat_id"];
          $outout["prod_name"] = $row["prod_name"];
          $outout["prod_desc"] = $row["prod_desc"];
          $outout["prod_cantidad"] = $row["prod_cantidad"];
        }
        echo json_encode($outout);

      } 

      break;
    
    case 'eliminar':
      $producto->deleteProducto($_POST["prod_id"]);
      break;

  }