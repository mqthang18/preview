<?php
    class Category {
        public function Category($conn) {
            $sql = "SELECT MaPLsp, IconPath, Title FROM categoryproduct"; 
            $result = $conn->query($sql);  
            return $result; 
        } 
        
        public function HProduct($conn) {
            $sql = "SELECT MaPLsp, Masp, ProductName, Path FROM hproduct"; 
            $result = $conn->query($sql); 
            return $result; 
        }

        public function ListItem($condition, $conn) {
            $sql = "SELECT Masp, ProductName, Price FROM listitem WHERE MaPLsp = '".$condition."'";
            $result = $conn->query($sql);

            $path = "./public/image/ListProduct/Category/".$condition;  
            $paths = [];
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $p = $path."/".$row["Masp"]."/".$row["Masp"].".jpg";
                    if (file_exists($p)) {
                        // $paths[$row['Masp']] = [$p,$row["ProductName"]];
                        $paths[$row['Masp']] = [$p,$row["ProductName"],$row['Price']];
                    }
                    // $label = $row["ProductName"];
                    // echo $p."<br>";
                }
              } else {
                echo "0 results";
              }

            // print_r(array_keys($paths));
            return $paths;
        }

        public function SearchProduct($condition, $conn) {
            $sql = "SELECT * FROM `listitem` WHERE `ProductName` LIKE '%".$condition."%'";
            $result = $conn -> query($sql);
            $paths = [];
            $path = "./public/image/ListProduct/Category/";

            if ($result -> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $p = $path.$row['MaPLsp']."/".$row['Masp']."/".$row['Masp'].".jpg";
                    if (file_exists($p)) {
                        $paths[$row['Masp']] = [$p,$row["ProductName"],$row['Price']];
                    }
                }
            }
            return $paths;
        }

        public function ProductInfo($cat,$condition, $conn) {
            $sql = "SELECT * FROM listitem WHERE Masp = '".$condition."'";
            $result = $conn->query($sql);
            // /preview/public/image/ListProduct/Category/TPTag/QAo1/QAo1-1.jpg
            $path = "/preview/public/image/ListProduct/Category/".$cat."/".$condition."/";
            $paths = [];
            $arr = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    for ($i = 1; $i <= $row['Available']; $i++) {
                        $p = $path.$condition."-".$i.".jpg";
                        if (file_exists($p)) {
                            array_push($paths, $p);
                        }
                    }
                    $row['FilePaths'] = $paths;
                    $arr = $row;
                }
            } 
            
            return $arr; 
        }

        public function InsertInfoCustomer($arr, $conn) {
            $sql = "INSERT INTO customer VALUES ('".$arr[0]."', '".$arr[1]."', '".$arr[2]."', '".$arr[3]."', '".$arr[4]."', '".$arr[5]."')";
            $result = $conn -> query($sql);
        }
    }   
?>