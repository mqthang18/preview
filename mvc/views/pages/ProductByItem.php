<?php 
    if(isset($data["item"])) {
        $arr = $data["item"];
    }   

    if(empty($arr)) {
        echo "<td>Sorry, we're not still having this products!</td></tr>";
    } else {
?>   
<div class="child-container">    
            <div class="image">
                <div class="image-show">
                    <img id="image-show" src="" alt="">
                </div>             
                <div class="ListProduct">
                    <button class="demo" id="slideBack" type="button" onclick="get_IDclicked(this.id)"><i class="arrow left"></i></button>
                    <div class="item" id="content">
                    <?php
                        $filepath = $arr["FilePaths"];
                        if (empty($filepath)) {
                            $filepath = "/preview/public/image/ListProduct/NoPreview.png";
                    ?>        
                        <div class="card">
                            <button>
                               <input id="i-1" class="image" type="image" src="<?php echo $filepath;?>" alt="">
                           </button>  
                       </div>
                    <?php   
                        } else {
                            for ($i=0;$i<count($filepath);$i++) {  
                                $ID = explode("/",$filepath[$i]);
                                $ID = explode(".",$ID[7]);
                                $ID = str_replace("_","/",$ID[0]);
                        ?>    
                         <div class="card">
                             <button id="<?php echo $ID;?>" onclick="getSRCimg(this.id)">
                                <input id="i-1" class="image" type="image" src="<?php echo $filepath[$i];?>" alt="">
                                <p><?php echo $arr["ProductName"];?></p>
                            </button>  
                        </div>
                    <?php }}?>
                    </div>
                    <button class="demo" id="slide" type="button" style="margin-left: auto;" onclick="get_IDclicked(this.id)"><i class="arrow right"></i></p></button>
                </div>
            </div>
            <div class="product-infor">
                <div class="title"><?php echo $arr["ProductName"];?></div>
                <div class="rating">Đánh giá: <?php echo $arr["Rating"];?></div>
                <!-- <div class="Branch">Thương hiệu: <?php echo $arr["Branch"];?></div> -->
                <div class="price">Giá: <span><?php echo $arr["Price"];?></span> VND</div>
                <div class="Color-group">
                    <span>Nhóm màu</span>
                    <table>
                        <tr>
                            <th><button id="Color-group1"></button></th>
                            <th><button id="Color-group2"></button></th>
                        </tr>
                        <tr>
                            <td><button id="Color-group3"></button></td>
                            <td><button id="Color-group4"></button></td>
                            <td><button id="Color-group5"></button></td>
                            <td><button id="Color-group6"></button></td>
                        </tr>
                    </table>
                </div>
                <div class="Size">Kích thước: <?php echo $arr["Size"];?></div>
                <div class="Number">Số lượng: <?php echo $arr["Available"];?></div>
                <div class="Order">
                    <div>
                        <input id="BuyNow" type="button" value="Mua ngay" onclick="GotoBuyItem()"></input>
                    </div>
                    <!-- <div>
                        <input id="AddToCart" type="button" value="Thêm vào vỏ hàng" onclick="GotoAddtoCart()"></input>
                    </div>        -->
                </div>
            </div>
            <div class="option">
                <p>Tùy chọn giao hàng</p>
                <ul>
                    <li>
                        <div>
                            <img src="\preview\public\image\Icon\Locate.jpeg" alt="">    
                            <span>Địa điểm</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="\preview\public\image\Icon\Limit.jpeg" alt="">
                            <span>GH tiêu chuẩn</span>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="\preview\public\image\Icon\CheckTogether.jpeg" alt="">
                            <span>Thanh toán khi nhận hàng (không được đồng kiểm)</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
<script>
    var GetSRCimg = document.getElementById("i-1");
    document.getElementById("image-show").src = GetSRCimg.getAttribute("src");
</script>
<?php }?>
