<?php 
    class CartModel extends DbContext{
        
        public function GetAllCart($userName){
            $sql = "SELECT * FROM booking INNER JOIN room ON booking.idRoom = room.idRoom WHERE booking.tenTK='".$userName."'";
            return mysqli_query($this->con,$sql);
        }
    }
?>