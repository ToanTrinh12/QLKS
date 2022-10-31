<?php 
    class Account extends DbContext{
        function GetAccount(){
            $sql = "SELECT * FROM account";
            return mysqli_query($this->con,$sql);
        }
    }

?>