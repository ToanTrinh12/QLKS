<?php 
    class Cart extends Controller{

        function Show(){
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