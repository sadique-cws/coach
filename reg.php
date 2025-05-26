<?php 

$name = "5404-5202-2521";


$result = preg_match("/^[0-9]{4}[-][0-9]{4}[-][0-9]{4}$/",$name);


if($result){
    echo "pass";
}
else{
    echo "fail";
}

?>