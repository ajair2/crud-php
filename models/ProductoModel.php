<?php
  class ProductoModel extends Conexion{

    public function getProducto() {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "SELECT 
        tm_producto.prod_id,
        tm_producto.cat_id,
        tm_producto.prod_name,
        tm_producto.prod_desc,
        tm_producto.prod_cantidad,
        tm_categoria.cat_name
        FROM 
          tm_producto INNER JOIN
            tm_categoria ON tm_producto.cat_id = tm_categoria.cat_id
        WHERE tm_producto.status = 1;";
      $sql = $conectar->prepare($sql);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }

    public function getProductoXId(int $prod_id) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $prod_id);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }

    public function deleteProducto(int $prod_id) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "UPDATE tm_producto 
        SET 
          status = 0, 
          fecha_deleted = now()
        WHERE
          prod_id = ?
      ";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $prod_id);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }

    public function insertProducto(int $cat_id, string $prod_name, string $prod_desc, int $prod_cantidad) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "INSERT INTO tm_producto (prod_id, cat_id, prod_name, prod_desc, prod_cantidad, fecha_created, fecha_modificated, fecha_deleted, status) VALUES (NULL, ?, ?, ?, ?, now(), NULL, NULL, 1);";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $cat_id);
      $sql->bindValue(2, $prod_name);
      $sql->bindValue(3, $prod_desc);
      $sql->bindValue(4, $prod_cantidad);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }

    public function updateProducto(int $prod_id, int $cat_id, string $prod_name, string $prod_desc, int $prod_cantidad) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "UPDATE tm_producto
        SET 
          cat_id = ?,
          prod_name = ?, 
          prod_desc = ?, 
          prod_cantidad = ?, 
          fecha_modificated = now()
        WHERE
          prod_id = ?
      ";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $cat_id);
      $sql->bindValue(2, $prod_name);
      $sql->bindValue(3, $prod_desc);
      $sql->bindValue(4, $prod_cantidad);
      $sql->bindValue(5, $prod_id);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }
  }