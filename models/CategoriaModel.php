<?php
  class CategoriaModel extends Conexion{
    /*TODO: Obtener todos los registros de la tabla categoria*/
    public function getCategoria() {
      $conectar = parent::Connect();
      parent::set_names();
      $sql = "SELECT * FROM tm_categoria WHERE status = 1";
      $sql = $conectar->prepare($sql);
      $sql->execute();
      return $resultado = $sql->fetchAll();
    }
  }