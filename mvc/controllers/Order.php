<?php
    class Order extends Controller {
        function BuyItem($a=null, $b=null, $c=null) {
            $conn = $this->Conn();
            $model = $this->model("Category", $conn)->ProductInfo($b, $c, $conn);
            // print_r($model);
            // print_r(isset($model["FilePaths"]));
            $view = $this->view("master-2", [
                'page' => $a,
                'item' => $model
            ]);
        }

       
        function AddtoCart($a, $b=null) {
            $view = $this->view("master-2", [
                'page' => $a
            ]);
        }
    }
?>