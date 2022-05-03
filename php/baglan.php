<?php

try{
    $db = new PDO("mysql:host=localhost; dbname=anime; charset=utf8", 'root', '');
    //echo "Data bağlantısı başarılı";
}

catch(Exception $e){
    echo $e ->getMessage();
}

?>