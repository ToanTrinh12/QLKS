<style>
    <?php 
        require_once "./mvc/views/components/booking/booking.css"; 
    ?>
</style>

<?php 
    $itemRoom = [];
    
    require_once("./mvc/core/FuncGlobal.php");

    //lấy ra room gán vào itemRoom
    while($row = mysqli_fetch_array($data["roomItem"])){
        $itemRoom = $row;
    };
?>


<div class="booking">
    <div class="booking__content">
        <div class="booking__content__image">
            <img src=<?php echo($itemRoom["image"]) ?> alt="">
        </div>
        <div class="booking__content__introduce">
            <h1><?php echo($itemRoom["nameRoom"]) ?></h1>
            <span class="booking__content__introduce__description"><?php echo($itemRoom["description"]) ?></span>
            <span class="booking__content__introduce__amount">Số phòng còn: 
                <span class="booking__content__introduce__amount__content"><?php echo($itemRoom["amount"]) ?></span>
                phòng
            </span>
            <span class="booking__content__introduce__price">Giá Phòng: 
                <span class="booking__content__introduce__price__content"><?php echo(cuttingPrice($itemRoom["priceRoom"])) ?> </span> VND
            </span>
        </div>
    </div>
    <form action="/qlkhachsan/room/Booking/<?php echo $itemRoom["idRoom"] ?>" method="POST" class="booking__box">
        <div class="booking__box__content">
            <div class="booking__box__content__date">
                <div class="booking__box__content__datestart">
                    <span>Ngày nhận phòng: </span>
                    <input id="datein" name="dateIn" type="date">
                </div>
                <div class="booking__box__content__dateend">
                    <span>Ngày trả phòng: </span>
                    <input id="dateout" name="dateOut" type="date">
                </div>
            </div>
            <div class="booking__box__content__amount">
                <span>Số phòng: </span>
                <input id="roomAcount" type="number" name="quantity" min="1" max="12">
            </div>
        </div>
        <div class="booking__box__button">
            <button id="myCheckbox">Đặt phòng</button>
        </div>
    </form>
</div>

<script>

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i=0; i<ca.length; i++) {
            let c = ca[i];
            let arr = c.split('=');
            if(arr.length == 2){
                if(arr[0]=="user"){
                    return arr[1];
                }
            }
        }
        return "";
    }

    function cutDate(date){
        return date.split("-");
    }

    let dateIn = document.getElementById("datein");
    let dateOut = document.getElementById("dateout");
    let inputAcount = document.getElementById("roomAcount");
    let roomAcount = document.querySelector(".booking__content__introduce__amount__content");


    document.getElementById("myCheckbox").addEventListener("click", function(event){

        var userName = document.cookie;
        
        if(getCookie(userName) === ""){
            event.preventDefault();
            alert("Vui lòng đăng nhập tài khoản!");
            window.location="http://localhost:8080/qlkhachsan";
        }

        if(dateIn.value === "" || dateOut.value === "" || inputAcount.value === "" ){
            if(dateIn.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn ngày nhận phòng trước khi đặt!");
            }
            else if(dateOut.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn ngày trả phòng trước khi đặt!");
            }
            else if(inputAcount.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn số lượng phòng muốn đặt đặt!");
            }
        }
        else{
            let arrDateIn = cutDate(dateIn.value);
            let monthIn = Number(arrDateIn[1])-1;
            let dateIn1 =new Date(arrDateIn[0],monthIn,arrDateIn[2])
            let dateIn2 = new Date()

            let arrDateOut = cutDate(dateOut.value);
            let monthOut = Number(arrDateOut[1])-1;
            let dateOut1 =new Date(arrDateOut[0],monthOut,arrDateOut[2])



            if(dateIn1 < dateIn2){
                event.preventDefault();
                alert("Vui lòng chọn lại ngày nhận phòng trước khi đặt!");
            }
            else if(dateIn1 > dateOut1){
                event.preventDefault();
                alert("Vui lòng chọn lại ngày trả phòng trước khi đặt!");
            }
            else if(Number(roomAcount.innerText) < Number(inputAcount.value)){
                event.preventDefault();
                alert("Vui lòng chọn lại số lượng phòng!");
            }

        }
        });
</script>