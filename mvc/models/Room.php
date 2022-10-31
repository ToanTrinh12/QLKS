<?php 
    class room extends DbContext{
        public function GetAllRoom(){
            $sql = "SELECT * FROM room";
            return mysqli_query($this->con,$sql);
        }

        public function GetRoom($idRoom){
            $sql = "SELECT * FROM room WHERE idRoom = '".$idRoom."'";
            return mysqli_query($this->con,$sql);
        }
    }
?>