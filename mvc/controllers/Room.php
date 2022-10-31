<?php 
    class Room extends Controller{

        function Show(){
            $listRooms = $this->model("Room");

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "list-room",
                "file" => "listroom",
                "listRoom"=> $listRooms->GetAllRoom(),
            ]);
        }

        function Booking($idRoom){

            // lấy ra giá tiền phòng qua id * số lượng => tiền phòng
            // thêm dữ liệu vào bảng booking
            // Trả lại view cart

            $listCarts = $this->model("CartModel");
            $userName = $_COOKIE["user"];

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "cart",
                "file" => "cart",
                "listcart"=> $listCarts->GetAllCart($userName),
            ]); 
        }
    };
?>