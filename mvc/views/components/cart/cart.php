<style>
    <?php 
        require_once "./mvc/views/components/cart/cart.css";
    ?>
</style>

<?php

    require_once "./mvc/core/FuncGlobal.php";

    $statistical = 0;
    $array = [];

    while($row = mysqli_fetch_array($data["listcart"])){
        array_push($array,$row);
    }

    for($i=0; $i< count($array); $i++){
        $statistical += (int)($array[$i]["price"]);
    }
    
?>


<div class="cart">
    <div class="cart__statistical">
        <span class="cart__statistical__content">Bạn đang có 
            <span><?php echo count($array)?></span> sản phẩm trong giỏ hàng
        </span>
        <div class="cart__statistical__price">
            <span>Thành tiền: </span>
            <span><?php echo cuttingPrice($statistical) ?> VNĐ</span>
        </div>
        <button id="cart__statistical__booking" class="cart__statistical__button" >Tiếp tục đặt hàng</button>
        <button id="cart__statistical__home" class="cart__statistical__button">Quay lại trang chủ</button>
    </div>
    <table class="cart__table table table-dark">
        <thead class="cart__table__header">
            <tr>
                <th scope="col">Ảnh phòng</th>
                <th scope="col">Tên phòng</th>
                <th scope="col">Ngày nhận</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="cart__table__body">
             <?php 
                for($i=0; $i< count($array); $i++){
                    echo(
                        "<tr class=cart__table__body__item>
                            <td class=cart__table__body__item__image>
                                <img src=".$array[$i]["image"]." alt=>
                            </td>
                            <td class=cart__table__body__item__name>".$array[$i]["nameRoom"]."</td>
                            <td class=cart__table__body__item__date-start>".$array[$i]["startDate"]."</td>
                            <td class=cart__table__body__item__date-end>".$array[$i]["endDate"]."</td>
                            <td class=cart__table__body__item__price>".$array[$i]["price"]."</td>
                            <td class='cart__table__body__item__icon cart__table__body__item__edit'>
                                <i class='bx bxs-edit-alt'></i>
                            </td>
                            <td class='cart__table__body__item__icon cart__table__body__item__delete'>
                                <i class='bx bxs-trash'></i>
                            </td>
                        </tr>"
                    );
                };
            ?>
        </tbody>
    </table>
</div>

<script>
    document.getElementById("cart__statistical__home").addEventListener("click", function(event){
        window.location="http://localhost:8080/qlkhachsan";
    });

    document.getElementById("cart__statistical__booking").addEventListener("click", function(event){
        window.location="http://localhost:8080/qlkhachsan/listroom";
    });
</script>