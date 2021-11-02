<?php
    $arr = $_POST["data"];
    $fullname = $arr[0];
    $email = $arr[1];
    $phoneNumber = $arr[2];
    $address = $arr[3];
    $coords = $arr[4];
    $item = $arr[5];
    $Fee = $arr[6];
    $MaPLsp = $arr[7];
    $Masp = $arr[8];
?>


    <form action="/preview/Order/BuyItem" method="POST" onsubmit="return false">
        <table>
            <tr>
                <td>Khách hàng</td>
                <td><?php echo $fullname;?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email;?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo $phoneNumber;?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?php echo $address;?></td>
            </tr>
            <?php 
                if ($coords!="") {
            ?>
            <tr>
                <td>Tọa độ</td>
                <td><?php echo $coords;?></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Tên sản phẩm</td>
                <td><?php echo $item[0];?></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><?php echo $item[1]?></td>
            </tr>
            <tr>
                <td>Phí vận chuyển</td>
                <td><?php echo $Fee." VND";?></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><img src="<?php echo $item[2];?>" style="widtd:150px; height:150px;"></td>
            </tr>
        </table>
        <div class="btn">
            <button id="btn-order" type="submit" name="btn-order">Đặt hàng</button>
        </div>
    </form>

    <script>
        $(document).ready(function(){
            var fullname = "<?php echo $fullname;?>";
            var phoneNumber = "<?php echo $phoneNumber;?>";
            var address = "<?php echo $address;?>";
            var Fee = "<?php echo (float)$item[1] + (float)$Fee;?>";
            var MaPLsp = "<?php echo $MaPLsp?>";
            var Masp = "<?php echo $Masp?>"
            var arr = [fullname, phoneNumber, address, Fee, MaPLsp, Masp];
            $("#btn-order").click(function() {        
                    $.ajax({
                    type: 'POST',
                    url: '/preview/mvc/views/pages/Goods/Response.php',
                    data: {dataCustomer : arr},
                    success: function(response) {
                        $('.CustomerInfor').html(response);
                            }
                    }); 
                }
            )}              
        )                   
    </script>