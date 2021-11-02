<?php 
        $result = $data['item'];
        // print_r($result);
        $mass = $result["Mass"]; 
        $Masp = $result['Masp'];
        $MaPLsp = $result['MaPLsp'];
        $Fee = 0;
        switch($mass) {
            case ($mass <= 2): 
                $Fee = 11800;
                break;
            default: 
                $Fee = 11800 + ($mass-2)/1700;  
            }
?>
<div class="child-container">
            <div class="left">
                <div class="CustomerInfor">
                    <form>
                        <table>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><?php echo $result['ProductName'];?></td>
                            </tr>
                            <tr>
                                <td>Giá sản phẩm</td>
                                <td><?php echo $result["Price"]." VND";?></td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyển</td>
                                <td><?php echo $Fee." VND";?></td>
                            </tr>
                            <?php 
                                if(empty($result["FilePaths"])) {
                                        $path = "/preview/public/image/ListProduct/NoPreview.png";
                                    } else {
                                        $path = $result["FilePaths"];
                                        $path = $path[0];
                                    }    
                            ?> 
                            <tr>
                                <td>Hình ảnh</td>
                                <td><img src="<?php echo $path;?>" style="widtd:150px; height:150px;"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <form class="right" action="BuyItem.php" method="POST" onsubmit="return false">
                <div class="information">
                    <table>
                        <tr>
                            <td class="t-left">                
                                <label for="username">Họ và tên</label>
                            </td>
                            <td class="t-right">
                                <input id="username" type="text" name="username" placeholder="Nguyen Tung Kien" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="t-left">
                                <label for="Email">Email</label>
                            </td>
                            <td class="t-right">
                                <input id="Email" type="text" name="Email" placeholder="NguyenVan_A@gmail.com" required>
                            </td>
                        </tr>
                        <tr>
                            <td class="t-left">
                                <label for="old">Độ tuổi</label>
                            </td>
                            <td class="t-right">
                                <select name="old" id="">
                                    <option value="none">None</option>
                                    <option value="10-18">10-18</option>
                                    <option value="18-21">18-21</option>
                                    <option value="21-30">21-30</option>
                                    <option value="30-40">30-40</option>
                                    <option value="40-50">40-50</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="t-left">
                                <label for="PhoneNumber">Số điện thoại di động</label>
                            </td>
                            <td class="t-right">
                                <input id="PhoneNumber" type="text" name="PhoneNumber">
                            </td>
                        </tr>
                        <tr>
                            <td class="t-left">
                                <label for="Address">Địa chỉ giao hàng</label>
                            </td>
                            <td class="t-right">
                                <input id="Address" type="text" name="Address" placeholder="Số nhà, đường, Khóm, Phường, Thành Phố">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="SetLocation">
                    Hoặc click vào nút này để chọn vị trí hiện tại của bạn làm nơi giao hàng
                    
                    <input id="setGeoLocation" class="demo" type="button" onclick="getLocation()" value="Set location"></input>
                    <input class="demo" id="demo" name="coords" style="width: 20%"></input>
                    <script>
                        var x = document.getElementById("demo");
                        
                        function getLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition);
                        } else { 
                            x.innerHTML = "Geolocation is not supported by this browser.";
                            }
                        }
                        
                        function showPosition(position) {
                            var lat = position.coords.latitude.toPrecision(10).toString();
                            var long = position.coords.longitude.toPrecision(10).toString();
                            x.value = lat +" "+ long;
                        }
                    </script>     
                </div>
                <div class="btn">
                    <button id="btn" name="btn_check" type="submit">Kiểm tra thông tin</button>
                </div>
                <script>
                    $(document).ready(function(){
                        $("#btn").click(function() {

                            var username = document.getElementById("username").value;
                            var email = document.getElementById("Email").value;
                            var phoneNum = document.getElementById("PhoneNumber").value;
                            var address = document.getElementById("Address").value;
                            var geoLocation = document.getElementById("demo").value;
                            var item = ["<?php echo $result['ProductName'];?>", "<?php echo $result["Price"]." VND";?>", "<?php echo $path;?>"];
                            var Fee = "<?php echo $Fee;?>";
                            var MaPLsp = "<?php echo $MaPLsp;?>";
                            var Masp = "<?php echo $Masp;?>";
                            var arr = [username, email, phoneNum, address, geoLocation, item, Fee, MaPLsp, Masp];

                            if (arr[0].length != 0 & arr[1].length != 0 & arr[2].length != 0 & arr[3].length != 0) {
                                $(".left").css("width","60%");
                                $(".right").css("width", "40%");                                
                                $.ajax({
                                type: 'POST',
                                url: '/preview/mvc/views/pages/Goods/VerifyInfor.php',
                                data: { data: arr },
                                success: function(response) {
                                        $('.CustomerInfor').html(response);
                                        }
                                    }); 
                                }
                            })              
                        })
                    
                </script>
            </form>
        </div>