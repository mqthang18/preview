<?php 
      $arr = $data["product"];
      $Cproduct = $data["Cproduct"];
?>    

<div class="filter-bar">
    <a href="#" onclick="location.href='/preview'" style='font-size:var(--p-fontsize); color:var(--c-characters); position: absolute; margin-top:25px;'>Trở về trang chủ <i class='fas fa-arrow-alt-circle-left'></i></a>
    <ul  style="list-style-type: none;">
        <li style="text-align: center;"><span style="font-size: var(-p--fontsize); font-family: Segoe UI; color:var(--c-characters);">Sắp xếp theo</span></li>
        <li>
            <form action="#" method="get">
                <select name="ByLevelSales" id="Regular1"  style="height: var(-p--fontsize); border-radius: 0%;">
                    <option value="New">Mới nhất</option>
                    <option value="">Bán chạy</option>
                </select>
            </form>
        </li>
        <li>
            <form action="#" method="get">
                <select name="ByPrice" id="Regular2" style="height: var(-p--fontsize); border-radius: 0%;">
                    <option value="Increasing">Giá: thấp tới cao</option>
                    <option value="Decreasing">Giá: cao tới thấp</option>
                </select>
            </form>
        </li>
        <li><button style="height: var(-p--fontsize); border-radius: 0%; padding:0" type="button" onclick="GetValueSortProduct()">Xác nhận</button></li>
        <!-- <li>
            <ul  style="list-style-type: none;">
                <li style="padding-right:10px; color: var(--c-characters)">1/100</li>
                <li><button><i class="arrow left"></i></button><button><i class="arrow right"></i></button></li>
            </ul>
        </li> -->
    </ul>
</div>


<div class="Pa-container">
        <div class="Sidebar">
                <div class="allCategory">
                    <h3 style="font-size:var(--h-fontsize)">Tất cả danh mục</h3>
                    <hr>
                    <ul>
                        <?php 
                            if ($Cproduct->num_rows > 0) {
                                // output data of each row
                                while($row = $Cproduct->fetch_assoc()) {
                                    $ID = $row["MaPLsp"];
                                    $title = $row["Title"];
                                
                                    echo '<li><a href="'.$ID.'">'.$title.'</a><li>'; 
                                }
                            }
                        ?>
                    </ul>
                    <hr>
                </div>
            </div>
        <div class="Child-ListProduct" style="overflow: auto;">
                    <table>
                        <tr>
                            <?php
                                  
                                    // print_r($arr);
                                    if(empty($arr)) {
                                        echo "<td>Sorry, we're not still having this products!</td></tr>";
                                    }

                                    $keys = array_keys($arr);
                                    
                                    if(isset($arr)) {
                                     for ($i=0;$i<count($keys);$i++) {  
                                         if ($i==4) {
                                             echo "</tr>";
                                         }  
                                         
                                         $ID = $keys[$i];     
                            ?>    
                            <td>
                                <div class="CartPByItem">
                                    <button id="<?php echo $ID;?>" onclick="GotoItemInfor(this.id)">
                                        <input class="image" type="image" src="<?php echo "/preview".substr($arr[$ID][0],1);?>" alt="c-product">
                                        <p style="font-size:var(--p-fontsize); color: blue; font-weight: var(--c--characterWeight);"><?php echo $arr[$ID][1];?></p>
                                        <p style="font-size:var(--p-fontsize)">Giá: <span style="color:red; font-weight: var(--c--characterWeight);"><?php echo $arr[$ID][2];?></span> VND</p>
                                    </button>
                                </div>
                            </td>  
                            <?php
                                    }
                                }
                            ?>  
                    </table>
             
           
        </div>
</div>
    
      