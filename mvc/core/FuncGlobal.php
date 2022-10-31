<?php 
    function cuttingPrice($stringPrice){
        $stringPrices = strrev($stringPrice);
        $result = "";
        $i=0;
        while($i<strlen($stringPrices)){
            $result ="".$result."".substr($stringPrices,$i,3).".";
            $i += 3;
            
        }

        return substr(strrev($result),1);
    }
?>