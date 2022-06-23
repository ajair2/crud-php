<?php
  class ProductoModel extends Conexion{

    public function getProducto() {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "SELECT * FROM tm_producto WHERE status = 1";
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

    public function insertProducto(string $prod_name) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "INSERT INTO tm_producto (prod_id, prod_name, fecha_created, fecha_modificated, fecha_deleted, status) VALUES (NULL, ?, now(), NULL, NULL, 1);";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $prod_name);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }

    public function updateProducto(int $prod_id, string $prod_name) {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "UPDATE tm_producto
        SET 
          prod_name = ?, 
          fecha_modificated = now()
        WHERE
          prod_id = ?
      ";
      $sql = $conectar->prepare($sql);
      $sql->bindValue(1, $prod_name);
      $sql->bindValue(2, $prod_id);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }
  }