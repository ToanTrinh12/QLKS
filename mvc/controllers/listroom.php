<?php 
    class listroom extends Controller{

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
            $roomItem = $this->model("Room");

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "booking",
                "file" => "booking",
                "roomItem" => $roomItem->GetRoom($idRoom),
            ]);
        }
    };
?>