<div class="banner">
        <img class="banner-img" src=".\public\image\Banner\Summer.jpg.png" alt="">
        </div>
        <hr>
        <div class="CategoryProduct">
            <div class="label">Danh mục sản phẩm</div>
            <div class="ListProduct">
                <!-- <button class="demo" id="slideBack" type="button" onclick="get_IDclicked(this.id)"><i class="arrow left"></i></button> -->
                <div class="test" id="content">
                    <?php
                        $arr = $data["Cproduct"];                                             
                        
                        if ($arr->num_rows > 0) {
                            // output data of each row
                            while($row = $arr->fetch_assoc()) {
                                $ID = $row["MaPLsp"];
                                $title = $row["Title"];
                                $path = $row["IconPath"];
                    ?>                            
                            <div class="card" style="border: none;">
                                <div id="<?php echo $ID;?>" onclick="getIDCategory(this.id)" style=" width: var(--w-c-item); height: max-content;  box-shadow: 1px 1px 2px 1px #6a6565; border-radius: 5% 5%;">
                                    <input class="image" type="image" src="<?php echo $path;?>" alt="category">
                                    <span style="font-size:.8rem; font-weight: 500;"><?php echo $title;?></span>
                                </div>  
                            </div>
                    <?php  
                        }
                            } else {
                            echo "0 results";      
                        }
                    ?>
                </div>
                <!-- <button class="demo" id="slide" type="button" style="margin-left: auto;" onclick="get_IDclicked(this.id)"><i class="arrow right"></i></p></button> -->
            </div>
        </div>
        <hr>
        <div class="NewProduct">
            <div class="label">Sản phẩm mới</div>
            <div class="ListProduct">
                <button class="demo" id="slideBack-1" type="button" onclick="get_IDclicked(this.id)"><i class="arrow left"></i></button>
                <div class="item" id="content-1">
                <?php
                        $result = $data["Hproduct"];
                        // print_r($pathfiles);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $pathfiles = $row["Path"];
                                $ID = explode("/",$pathfiles);
                                $ID = explode(".", $ID[5]);
                                $ID = str_replace("_","/", $ID[0]);
                                $label = $row["ProductName"];
                ?>    
                    <div class="card">
                        <button id="<?php echo $ID;?>" onclick="GotoItemInfor(this.id)">
                            <input class="image" type="image" src=<?php echo $pathfiles;?> alt="h-product">
                            <p style="font-weight: 500;"><?php echo $label?></p>
                        </button>
                    </div>
                <?php   
                }
                    } else {
                            echo "0 results";
                            }
                ?>  

                </div>
                <button class="demo" id="slide-1" type="button" style="margin-left: auto;" onclick="get_IDclicked(this.id)"><i class="arrow right"></i></p></button>
            </div>
        </div>
        <hr>
    