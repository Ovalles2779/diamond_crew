<?php
    session_start();

    class Conectar{
        protected $dbh;

        protected function Conexion() {
            try {
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=724_helpdesk","root","");

                return $conectar;
            } catch (PDOException $e) {
                print "Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){

            return $this->dbh->query("SET NAMES 'UTF8'");
        }

        public function ruta(){
            return "http://localhost/help_desk/";

        }
    }
?>