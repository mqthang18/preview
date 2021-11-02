<?php 
    $arr = $_POST["dataCustomer"];
    #$arr = ["MQT", "0949005902"];
    $controller = "Category";
    $action = "InsertInfoCustomer";
    

    if (file_exists("D:/XAMPP/htdocs/preview/mvc/models/".$controller.".php")) {
        require_once "D:/XAMPP/htdocs/preview/mvc/models/".$controller.".php";
        require_once "D:/XAMPP/htdocs/preview/mvc/core/Controller.php";
        $Control = new Controller();
        $conn = $Control->Conn();
        $params = [$arr, $conn];
        $controller = new $controller;
        $result = call_user_func_array([$controller,$action], $params);
        echo "Quý khách đã đặt hàng thành công! <br> Cảm ơn quý khách đã ủng hộ shop!";
    } else {
        echo "Not connected";
    }
?>



