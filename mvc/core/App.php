<?php
    class App {
        // Proces Home/action/a/b/c string  
        protected $controller="Home";
        protected $action="HomePage";
        protected $params=["General"];

        function __construct() {
            // Home/SayHi/1
            $arr = $this->URLprocess();
            // print_r($arr);

            //Xu li controller
            if (isset($arr[0])) {
                if (file_exists("./mvc/controllers/".$arr[0].".php")) {
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }  
            }
         
            require_once "./mvc/controllers/".$this->controller.".php";
            //Xu ly action 
            if (isset($arr[1])) {
                if(method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                    unset($arr[1]);
                }           
            }
            // echo $this->controller."<br>";
            // echo $this->action."<br>";
            
            $this->controller = new $this->controller;
            //Xu ly params 
            if(isset($arr[2])) {
                $this->params = $arr?array_values($arr):[];
            }
            
            
            
            // print_r($this->params);
            
            call_user_func_array([$this->controller,$this->action],$this->params);
        }

        function URLprocess() {
            if (isset($_GET["url"])) {
                $url = $_GET['url'];
                return explode("/", trim($url,"/"));
            }
        }
    }
?>