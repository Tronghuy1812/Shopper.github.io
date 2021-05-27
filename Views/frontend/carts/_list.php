<div>
    <p id="notification">

    </p>
</div>
<list-product>
    <div class="container cart">
        <div class="titlePrimary">
            Giỏ Hàng.
        </div>
        <br>
            <?php if(!empty($_SESSION['cart'])): ?>
            <form action="index.php?controller=cart&action=update" method="post" >
                <table width="100%" border="1" cellpadding="0" cellspacing="0" class="cart-order">
                    <thead>
                        <tr height='30'>
                            <!-- <td align="center"  >ID</td> -->
                            <td align="center"  >Hình ảnh</td>
                            <td align="center" >Tên sản phẩm</td>
                            <td align="center">Giá sản phẩm</td>
                            <td align="center" >Số lượng</td>
                            <td align="center">Thành tiền</td>
                            <td align="center">Hành động</td>
                        </tr>	
                    </thead>
                    <tbody>
                        <?php foreach($products as $product) : ?>
                            <tr height='70'>
                                <!-- <td align="center"  ><?=$product['id']?></td> -->
                                <td align="center" >
                                    <img src="./public/uploads/<?= $product['image'] ? $product['image'] : 'no-image.jpg' ?>" width="100"> 
                                </td>
                                <td align="center"><?=$product['name']?></td>
                                <td align="center"><?=number_format($product['price'],0)?></td>
                                <td align="center" width="30">
                                    <input type="number" name='qty[<?=$product['id']?>]' value="<?=$product['qty']?>" style="padding:5px;text-align:center;">
                                </td>
                                <td align="center">
                                    <?= number_format($product['price'] * $product['qty'],0)?>
                                </td>
                                <td align="center" width="100px">
                                    <a href="index.php?controller=cart&action=delete&id=<?=$product['id']?>" class="far fa-trash-alt" title="Chọn để xóa">
                                    
                                    </a> 
                                </td>
                            </tr>
                        <?php endforeach ; ?>
                    </tbody>
                    <tfood>
                        <tr>
                            <td colspan="6" >
                                <p class="total_price" align="center">
                                    Tổng Tiền :
                                    <stong>
                                        <?php 
                                            $total =0;
                                            foreach($products as $product) 
                                            {
                                                
                                                $total += $product['qty']*$product['price'];
                                                
                                            };
                                        ?>
                                        <?= number_format($total,0)?> VND
                                    </stong>
                                </p>
                            </td>
                        </tr>
                    </tfood>
                </table>
                <div>
                    <p align="right" class="right">
                        <a href="index.php?controller=cart&action=destroy" class="destroy">Xóa tất cả</a> |
                        <a href="index.php" class="continue"><i class="fas fa-angle-left">
                            </i> Tiếp tục mua
                        </a> |
                        <button class="update " >Cập nhật <i class="fas fa-angle-right"></i></button>
                    </p>
                </div>
            </form>
            <p><button onclick="showForm(); "  class="order">Đặt Hàng </button></p>
                <br/>
                <br/>
                <br/>
                    <!-- form đặt hàng -->
                <?php if(isset($_SESSION['customer'])) : ?>               
                    <div class="form-order" style="display: none;">
                        <form action="index.php?controller=order&action=store" method="post">
                            <label>Tên khác hàng</label>
                            <input type="text" name="customer_name" />
                            <br/>

                            <label>Email khác hàng</label>
                            <input type="text" name="customer_email" />
                            <br/>

                            <label>Số điện thoại</label>
                            <input type="text" name="customer_phone" />
                            <br/>

                            <label>&nbsp;</label>
                            <button class="order"  onclick="myFunction()">Gửi đơn hàng</button>
                            <br/>
                        </form>
                    </div>
               <?php else: ?>
               <div class="errors_login">
                    <i class="fas fa-bell"></i><span>Vui lòng <a href="index.php?controller=customer" style="text-decoration: underline;">Login</a> trước khi gửi đơn hàng .</span>
                    
               </div>
               <?php endif;?>
        </div>
        <?php else : ?>
           <p align="center" >Không có sản phẩm nào trong giỏ hàng.</p>
        <?php endif; ?>
    </div>
</list-product>


<style>
    .form-order label {
        width: 200px;
        float: left;
    }

    .form-order input {
        padding: 5px;
        width: 200px;
        margin-bottom: 10px;
    }
</style>


<script>
    function showForm() {
        $(".form-order").slideToggle();
    }

    function myFunction() {
        document.getElementById("notification").innerHTML = "Vui lòng Login trươc khi gửi đơn hàng";
    }
</script>

<br>