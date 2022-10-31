<style>
    <?php 
        require_once "./mvc/views/components/list-room/listroom.css";
    ?>
</style>

<div class="list--room">
    <div class="list--room__image">
       <img src="http://chupanhnoithat.vn/upload/images/ch%E1%BB%A5p%20h%C3%ACnh%20qu%E1%BA%A3ng%20c%C3%A1o%20kh%C3%A1ch%20s%E1%BA%A1n.JPG" alt="">
    </div>
    <div class="list--room__content">
        <div class="list--room__content__layout">
            <div class="list--room__content__layout__filter">
                <div class="list--room__content__layout__filter__input">
                    <input type="text" placeholder="Nhập thông tin tìm kiếm">
                </div>
                <div class="list--room__content__layout__filter__option">
                    <div class="list--room__content__layout__filter__option__price">
                        <span>Chọn giá phòng: </span>
                        <select id="priceroom">
                            <option value="">Tất cả</option>
                            <option value="0">duoi 1000000</option>
                            <option value="1000000">trên 1000000</option>
                            <option value="2000000">Trên 2000000</option>
                            <option value="3000000">Trên 3000000</option>
                        </select>
                    </div>
                    <div class="list--room__content__layout__filter__option__type">
                        <span>Chọn loại phòng: </span>
                        <select id="typeroom">
                            <option value="">Tất cả</option>
                            <option value="vip">Vip</option>
                            <option value="thường">Thường</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php 
                require_once "./mvc/views/components/room/room.php";
            ?>

            <ul class="list--room__content__layout__rooms">
                <?php 
                    while($row = mysqli_fetch_array($data["listRoom"])){
                        echo(
                            Room($row)
                        );
                    };
                ?>
            </ul>
        </div>
    </div>
</div>