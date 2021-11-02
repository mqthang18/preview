<?php
    class Home extends Controller {
        function Home($a) {
            $conn = $this->Conn();
            $arr = $this->model("Category"); 
            $Cproduct = $arr->Category($conn);
            $Hproduct = $arr->HProduct($conn);

            $view = $this->view("master-1", [
                "page" => $a,
                "Cproduct" => $Cproduct,
                "Hproduct" => $Hproduct
            ]);
        }

        function ProductByCategory($a, $b) {
            $conn = $this->Conn();
            $arr = $this->model("Category");
            $result = $arr->ListItem($b, $conn);
            $Cproduct = $arr->Category($conn);

            $view = $this->view("master-1", [
                "page" => "ProductByCategory",
                "product" => $result,
                "Cproduct" => $Cproduct
            ]);
            // print_r($result);
        }

        function ProductByItem($a=null,$b=null,$c=null) {
            $conn = $this->Conn();
            $arr = $this->model("Category");
            // echo $a;
            // echo $b;
            // echo $c;
            
            $result = $arr->ProductInfo($b,$c,$conn);

            // print_r($result);
            $view = $this->view("master-1", [
                "page" => "ProductByItem",
                "item" => $result
            ]);
        }

        function Search ($a) {
            $conn = $this->Conn();
            $arr = $this->model("Category");
            $Cproduct = $arr->Category($conn);
            $result = $this->model('Category')-> SearchProduct($a, $conn);
            // print_r($paths);
            
            $view = $this->view("master-1", [
                "page" => "ProductByCategory",
                "product" => $result,
                "Cproduct" => $Cproduct
            ]);
        }

        function Test($a) {
            $conn = $this->Conn();
            $arr = $this->model("Category");
            $Hproduct = $arr->ListItem($conn, $a);
            $result = $Hproduct;
            echo $a."<br>";
            // D:\XAMPP\htdocs\preview\public\image\ListProduct\Category\TPTag\QAo2\QAo2.jpg
            $path = "./public/image/ListProduct/Category/".$a;  
            $paths = [];
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $p = $path."/".$row["Masp"]."/".$row["Masp"].".jpg";
                    if (file_exists($p)) {
                        $paths[$row['Masp']] = $p;
                    }
                    // $label = $row["ProductName"];
                    echo $p."<br>";
                }
              } else {
                echo "0 results";
              }


              print_r($paths);

              print_r(array_keys($paths));

        }
    }
?>