<?php
  class Conexion {
    protected $dbhost;

    protected function Connect() {
      try {
        $conectar = $this->dbhost = new PDO("mysql:local=localhost;dbname=dbcrudphp", "root", "");
        return $conectar;

      } catch(Exception $e) {
        print "Error DB!: " . $e->getMessage();
        die(); # Terminar conexión
      }
    }

    public function set_names() {
      return $this->dbhost->query("SET NAMES 'utf8'");
    }
  }