<?php
    class Controller {
        public function model($model, $data=[]) {
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function view($views, $data=[]) {
            require_once "./mvc/views/".$views.".php";
        }

        public function Conn() {
            $server_username = "root";
            $server_password = "";

            $server_host = "localhost";
            $database = "testsale";
            $conn = mysqli_connect($server_host,$server_username,$server_password,$database);
            mysqli_query($conn,"SET NAMES 'UTF8'");

            return $conn;
        }
    }
?>